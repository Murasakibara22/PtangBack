<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Transaction as TransactionModel;

class Transaction extends Component
{
    public $numero_transaction , $montant ,$description,$nom_banque ;
    public $code_IBAN = '07n';

 
    protected $rules = [
        'numero_transaction' => ['required'],
        'code_IBAN' => ['required','min:5'],
        'montant' => ['required'],
        'nom_banque' => ['required'],
    ];

    protected $messages = [
        'numero_transaction.required' => 'ce champs est obligatoire',
        'code_IBAN.required' => 'ce champs est obligatoire',
        'montant.required' => 'ce champs est obligatoire',
        'nom_banque.required' => 'ce champs est obligatoire',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function saveTransaction() {
        $this->validate();

        $transac = new TransactionModel;
        $transac->numero_transaction = $this->numero_transaction;
        $transac->montant = $this->montant;
        $transac->description = $this->description;
        $transac->nom_banque = $this->nom_banque;
        $transac->code_IBAN = $this->code_IBAN;
        $transac->ref = $this->numero_transaction.Carbon::now().$this->code_IBAN.Auth::user()->code_securiter;
        $transac->numero_compte = Auth::user()->numero_compte;
        $transac->slug = 'ptang'.Hash::make($this->numero_transaction).Auth::user()->numero_compte;
        $transac->user_id = Auth::user()->id ;
        $transac->save();
    }

    public function render()
    {
        return view('livewire.transaction', [
            'transaction_list' => TransactionModel::OrderBy('created_at','DESC')->get()
        ]);
    }
}
