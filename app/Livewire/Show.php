<?php

namespace App\Livewire;

use Livewire\Component;

class Show extends Component
{
    public $transaction_list ;
    function mount($transaction)  {
        $this->transaction_list = $transaction ;
    }
    public function render()
    {
        return view('livewire.show');
    }
}
