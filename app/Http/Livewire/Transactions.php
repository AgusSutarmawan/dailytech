<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Transactions extends Component
{
    public $transactions;
    public $response;
    public $collection;
    public $filtered;
    public function render()
    {
        $this->transactions = Transaction::with(['user'])->get();
        return view('livewire.transactions');
    }

 // public function notification()
    // {
    //     $response = Http::get('http://localhost:3030/notification');
    //     $collection = $response->collect(); 
    //     return view('livewire.notification', ['collection' => $collection]);
    // }
}

