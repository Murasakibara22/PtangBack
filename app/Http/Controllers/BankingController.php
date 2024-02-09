<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Client;

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



    public function getUserInfo(Request $request)
    {
        // dd($request->server('HTTP_USER_AGENT'));
        dd($request->server);
        $userIp = $request->ip();
        // $userIp = "160.154.102.143";

        $client = new Client();
        $response = $client->get("https://ipinfo.io/{$userIp}?token=".env("LOCATION_API"));

        $data = json_decode($response->getBody());
        dd($data);

        $location = $data->loc;
        $country = $data->country;
        $currency = $data->currency;

        return view('user-info', compact('location', 'country', 'currency'));
    }
}
