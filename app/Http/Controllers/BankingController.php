<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class BankingController extends Controller
{
    function index()  {
        return view('home');
    }

    public function login(Request $request)
    {
        /* ── 1. Validation des champs ── */
        $request->validate([
            'numero_compte' => ['required', 'string', 'min:5', 'max:14'],
            'password'      => ['required', 'string', 'min:1'],
        ]);

        $numeroCompte = $request->input('numero_compte');
        $password     = $request->input('password');

        /* ── 2. Rate limiting (max 5 tentatives / minute par IP) ── */
        $throttleKey = 'banking-login:' . Str::lower($numeroCompte) . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, maxAttempts: 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            return response()->json([
                'success' => false,
                'message' => "Zu viele Anmeldeversuche. Bitte warten Sie {$seconds} Sekunden.",
            ], 429);
        }

        /* ── 3. Tentative d'authentification ── */
        $credentials = [
            'numero_compte' => $numeroCompte,
            'password'      => $password,
        ];

        if (Auth::attempt($credentials, remember: false)) {
            /* Succès : reset rate limiter + régénérer session */
            RateLimiter::clear($throttleKey);
            $request->session()->regenerate();

            return response()->json([
                'success'  => true,
                'message'  => 'Connexion réussie !',
                'redirect' => route('dashboard.ptang'),
            ], 200);
        }

        /* ── 4. Échec : incrémenter compteur ── */
        RateLimiter::hit($throttleKey, decay: 60);

        $remaining = RateLimiter::remaining($throttleKey, maxAttempts: 5);

        return response()->json([
            'success' => false,
            'message' => $remaining > 0
                ? 'Numéro de compte ou mot de passe incorrect.'
                : 'Trop de tentatives. Veuillez patienter.',
        ], 401);
    }

    public function profile()  {
        return view('bank.pages.profile');
    }

    public function get_transaction()  {
        return view('bank.pages.transaction');
    }

    public function get_wallet()  {
        return view('bank.pages.wallet');
    }

    public function show_transac($id)  {
        $transaction = Transaction::where('id',$id)->first();
        return view('bank.pages.show_transaction', compact('transaction'));
    }
}
