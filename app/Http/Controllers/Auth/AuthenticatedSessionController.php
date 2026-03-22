<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.loginDeutch');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }



    public function loginFeat(Request $request)
    {
        // 1. Valider les données
        $request->validate([
            'numero_compte' => 'required|string',
            'password' => 'required|string',
        ]);

        // 2. Préparer les credentials
        // ATTENTION : Adapter selon ta structure de BDD
        // Si tu utilises 'email' au lieu de 'numero_compte', modifie ici
        $credentials = [
            'numero_compte' => $request->numero_compte,
            'password' => $request->password,
        ];

        // 3. Tentative de connexion
        if (Auth::attempt($credentials)) {
            // Régénérer la session pour sécurité
            $request->session()->regenerate();

            // ✅ RETOURNER DU JSON (PAS DE REDIRECTION ICI !)
            return response()->json([
                'success' => true,
                'message' => 'Connexion réussie !',
                'redirect' => route('dashboard') // Ou url('/dashboard')
            ], 200);
        }

        // 4. Échec de connexion
        // ✅ RETOURNER DU JSON avec status 401
        return response()->json([
            'success' => false,
            'message' => 'Numéro de compte ou mot de passe incorrect'
        ], 401);
    }
}
