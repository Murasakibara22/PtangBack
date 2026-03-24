<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Mail;       // Décommenter pour l'envoi d'email
// use App\Mail\ProfileUpdatedMail;            // Décommenter : créer cette Mailable

class ProfileUpdateController extends Controller
{
    /**
     * Afficher la page de modification de profil.
     */
    public function show()
    {
        return view('bank.edit-profile');
    }

    /**
     * Traiter la mise à jour de l'email et du mot de passe.
     *
     * Reçoit en JSON :
     *   - email                 : string
     *   - password              : string (min 8 car.)
     *   - password_confirmation : string
     *
     * Retourne JSON :
     *   - success  : bool
     *   - message  : string
     *   - redirect : string (si succès)
     */
    public function update(Request $request)
    {
        /* ── 1. Validation des champs ── */
        $request->validate([
            'email'    => ['required', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        /* ── 2. Mise à jour email + mot de passe ── */
        $user->email    = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        /* ── 3. Envoi email de confirmation (commenté — décommenter quand prêt) ──
         *
         * Cette section envoie un email de confirmation à l'utilisateur
         * après la mise à jour réussie de son profil.
         *
         * Étapes pour activer :
         *   1. Créer la Mailable : php artisan make:mail ProfileUpdatedMail --markdown=emails.profile-updated
         *   2. Configurer MAIL_* dans .env (SMTP, Mailtrap, Mailgun, etc.)
         *   3. Décommenter les lignes ci-dessous
         *
         * Mail::to($user->email)->send(new ProfileUpdatedMail($user));
         *
         * Contenu suggéré pour l'email :
         *   - Objet  : "Ihr Profil wurde aktualisiert – Deutsche Bank"
         *   - Corps  : Confirmation de la modification + date/heure + lien de contact support
         *   - Footer : Logo Deutsche Bank + coordonnées support
         */

        return response()->json([
            'success'  => true,
            'message'  => 'Profil erfolgreich aktualisiert.',
            'redirect' => route('dashboard.profile'),
        ], 200);
    }
}
