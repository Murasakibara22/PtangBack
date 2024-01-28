<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class BankingController extends Controller
{
    function index()  {
        return view('home');
    }

    public function login(Request $request)  {

        $credentials = $request->only('numero_compte', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Authentification réussie
            return redirect(RouteServiceProvider::HOME);
        }

        // Authentification échouée
        return back()->withErrors([
            'numero_compte' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ]);

    }
}
