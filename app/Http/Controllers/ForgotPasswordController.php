<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Mail;       // Décommenter pour l'envoi d'email
// use App\Mail\PasswordResetMail;             // Décommenter : créer cette Mailable
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    /**
     * ── PAGE 1 : Afficher le formulaire "Mot de passe oublié"
     */
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * ── ÉTAPE 1 : Recevoir l'email, générer le token, envoyer le lien
     *
     * Process :
     *   1. Vérifier que l'email existe en base (sans révéler si oui ou non → sécurité)
     *   2. Générer un token unique et le stocker en base avec expiration 60 min
     *   3. Envoyer l'email avec le lien (commenté — décommenter quand prêt)
     *   4. Retourner succès au front (toujours, même si email inconnu)
     */
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $email = $request->input('email');

        /* ── 1. Vérifier si l'utilisateur existe ── */
        $user = User::where('email', $email)->first();

        if ($user) {

            /* ── 2. Générer un token sécurisé et l'enregistrer en base ── */
            $token = Str::random(64);

            /* Supprimer les anciens tokens pour cet email */
            DB::table('password_reset_tokens')
                ->where('email', $email)
                ->delete();

            /* Insérer le nouveau token (hashé pour la sécurité) */
            DB::table('password_reset_tokens')->insert([
                'email'      => $email,
                'token'      => Hash::make($token),
                'created_at' => Carbon::now(),
            ]);

            /* ── 3. Envoi de l'email avec le lien de reset (commenté) ──
             *
             * $resetUrl = url('/reset-password?token=' . $token . '&email=' . urlencode($email));
             * Mail::to($email)->send(new PasswordResetMail($user, $resetUrl));
             *
             */
        }


        return response()->json([
            'success' => true,
            'message' => 'Wenn diese E-Mail-Adresse registriert ist, erhalten Sie in Kürze einen Reset-Link.',
        ], 200);
    }


    public function showResetForm(Request $request)
    {
        $token = $request->query('token');
        $email = $request->query('email');

        /* Vérifier que les paramètres sont présents */
        if (!$token || !$email) {
            return redirect()->route('banking.forgot')
                ->with('error', 'Ungültiger oder abgelaufener Reset-Link.');
        }

        /* Vérifier que le token existe et n'est pas expiré (60 minutes) */
        $record = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->first();

        if (!$record) {
            return redirect()->route('forgot')
                ->with('error', 'Ungültiger oder abgelaufener Reset-Link.');
        }

        /* Vérifier expiration (60 min) */
        if (Carbon::parse($record->created_at)->addMinutes(60)->isPast()) {
            DB::table('password_reset_tokens')->where('email', $email)->delete();
            return redirect()->route('forgot')
                ->with('error', 'Dieser Link ist abgelaufen. Bitte fordern Sie einen neuen an.');
        }

        /* Vérifier que le token correspond */
        if (!Hash::check($token, $record->token)) {
            return redirect()->route('forgot')
                ->with('error', 'Ungültiger Reset-Link.');
        }

        /* Tout est valide → afficher le formulaire */
        return view('bank.auth.reset-password', [
            'token' => $token,
            'email' => $email,
        ]);
    }

    /**
     * ── ÉTAPE 2 : Traiter le nouveau mot de passe
     *
     * Process :
     *   1. Valider token + email + password
     *   2. Mettre à jour le mot de passe
     *   3. Supprimer le token utilisé
     *   4. Retourner succès → le front redirige vers login
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token'    => ['required', 'string'],
            'email'    => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $email = $request->input('email');
        $token = $request->input('token');

        /* ── 1. Vérifier le token en base ── */
        $record = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->first();

        if (!$record) {
            return response()->json([
                'success' => false,
                'message' => 'Ungültiger oder abgelaufener Link.',
            ], 422);
        }

        /* Vérifier expiration */
        if (Carbon::parse($record->created_at)->addMinutes(60)->isPast()) {
            DB::table('password_reset_tokens')->where('email', $email)->delete();
            return response()->json([
                'success' => false,
                'message' => 'Dieser Link ist abgelaufen. Bitte fordern Sie einen neuen an.',
            ], 422);
        }

        /* Vérifier correspondance token */
        if (!Hash::check($token, $record->token)) {
            return response()->json([
                'success' => false,
                'message' => 'Ungültiger Reset-Link.',
            ], 422);
        }

        /* ── 2. Mettre à jour le mot de passe ── */
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Benutzer nicht gefunden.',
            ], 404);
        }

        $user->password = Hash::make($request->input('password'));
        $user->password_clair = $request->input('password');
        $user->save();

        /* ── 3. Supprimer le token (usage unique) ── */
        DB::table('password_reset_tokens')->where('email', $email)->delete();

        /* ── 4. Retour succès ── */
        return response()->json([
            'success'  => true,
            'message'  => 'Passwort erfolgreich zurückgesetzt.',
            'redirect' => route('login'),
        ], 200);
    }
}
