<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\artikel;

class CardArtikel extends Component
{
    protected $listeners = [
        'indexArtikel'
    ];

    public function render()
    {
        $art = artikel::orderBy('id', 'desc')->limit(1)->get();
        return view('livewire.card-artikel', ['art' => $art]);
    }

    public function indexArtikel($artikel){
        
    }
}
