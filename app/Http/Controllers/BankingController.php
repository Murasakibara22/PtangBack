<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

        return redirect()->back();
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
