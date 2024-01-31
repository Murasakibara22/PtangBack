<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{

    public $nom , $prenom ,$numero_compte,$email , $date_exp, $code_securiter , $adresse , $phone ;
    public $AsImage ;

    function mount()  {
        $this->nom = auth()->user()->nom;
        $this->prenom = auth()->user()->prenom;
        $this->numero_compte = auth()->user()->numero_compte;
        $this->email = auth()->user()->email;
        $this->date_exp = auth()->user()->date_exp;
        $this->code_securiter = auth()->user()->code_securiter;
        $this->adresse = auth()->user()->adresse;
        $this->phone = auth()->user()->phone;
    }

    protected $rules = [
        'nom' => ['required'],
        'prenom' => ['required'],
        'numero_compte' => ['required'],
        'email' => ['required','email'],
        'code_securiter' => ['required'],
        'adresse' => ['required'],
        'phone' => ['required'],
        'date_exp' => ['required'],
    ];

    protected $messages = [
        'nom.required' => 'ce champs est obligatoire',
        'prenom.required' => 'ce champs est obligatoire',
        'numero_compte.required' => 'ce champs est obligatoire',
        'email.required' => 'ce champs est obligatoire',
        'email.email' => 'email invalid',
        'code_securiter.required' => 'ce champs est obligatoire',
        'adresse.required' => 'ce champs est obligatoire',
        'phone.required' => 'ce champs est obligatoire',
        'date_exp.required' => 'ce champs est obligatoire',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    function save_user()  {
        $this->validate();

        $user = User::find(auth()->user()->id);
        $user->nom =  $this->nom ;
        $user->prenom = $this->prenom;
        $user->email = $this->email;
        $user->numero_compte = $this->numero_compte;
        $user->code_securiter = $this->code_securiter;
        $user->adresse = $this->adresse;
        $user->phone = $this->phone;
        $user->date_exp = $this->date_exp;
        $user->slug = 'ptang'.Hash::make($this->email).Auth::user()->nom;
        $user->update();

        $this->reset();
        $this->mount();
    }


    public function render()
    {
        return view('livewire.profile');
    }
}
