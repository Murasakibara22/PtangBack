<?php

use App\Livewire\Transaction;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankingController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // dd( Hash::make('123456789x') );
    return redirect('/login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/mon_compte/dashboard_bank',[BankingController::class,'index'])->name('dashboard.ptang');
    Route::get('/mon_compte/profile',[BankingController::class,'profile'])->name('dashboard.profile');
    Route::get('/mon_compte/transactions',[BankingController::class,'get_transaction'])->name('transaction.index');
    Route::get('/mon_compte/Wallet',[BankingController::class,'get_wallet'])->name('wallet.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/deconnexion', function () {
    auth()->logout();
    return redirect('/');
});


require __DIR__.'/auth.php';
