<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Transaction as TransactionModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendTransaction;

class Transaction extends Component
{
    public $numero_transaction , $montant ,$description,$nom_banque, $email_beneficiaire ;

    public $nat_IBAN, $name_beneficiaire , $etab_banque,$code_IBAN , $code_BIC ;


    protected $rules = [
        'nat_IBAN' => ['required'],
        'name_beneficiaire' => ['required'],
        'etab_banque' => ['required'],
        'montant' => ['required','int'],
        'code_IBAN' => ['required'],
        'code_BIC' => ['required'],
        'email_beneficiaire' => ['required','email'],
    ];

    protected $messages = [
        'nat_IBAN.required' => 'ce champs est obligatoire',
        'name_beneficiaire.required' => 'ce champs est obligatoire',
        'etab_banque.required' => 'ce champs est obligatoire',
        'montant.required' => 'ce champs est obligatoire',
        'code_IBAN.required' => 'ce champs est obligatoire',
        'code_BIC.required' => 'ce champs est obligatoire',
        'email_beneficiaire.required' => 'ce champs est obligatoire',
        'email_beneficiaire.email' => 'ce champs doit etre une adresse email',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function saveTransaction() {
        $this->validate();

        $transac = new TransactionModel;
        $transac->etab_banque = $this->etab_banque;
        $transac->montant = $this->montant;
        $transac->name_beneficiaire = $this->name_beneficiaire;
        $transac->nat_IBAN = $this->nat_IBAN;
        $transac->code_IBAN = $this->code_IBAN;
        $transac->ref = $this->etab_banque.Carbon::now().$this->code_IBAN.Auth::user()->code_securiter;
        $transac->code_BIC = $this->code_BIC;
        $transac->slug = 'ptang'.Hash::make($this->etab_banque).Auth::user()->numero_compte;
        $transac->user_id = Auth::user()->id ;
        $transac->save();

        $user = auth()->user();
        $data = [
            'name' => $user->nom.' '.$user->prenom,
            'num_compte' => $transac->code_IBAN,
            'montant' => $transac->montant,
        ];
        Mail::to($this->email_beneficiaire)->send(new SendTransaction($data));

        $this->send_event_at_sweetAlerte('Enregistrer',"Transaction valider avec succès !", "success");
        $this->reset();
    }


    private function send_event_at_sweetAlerte($title = 'merci', $message , $type)  {
        $this->dispatchBrowserEvent('swal:modalMessage', [
            'title' => $title,
            'text' => $message,
            'type' => $type
        ]);
    }

    public function render()
    {
        return view('livewire.transaction', [
            'transaction_list' => TransactionModel::OrderBy('created_at','DESC')->get()
        ]);
    }
}
