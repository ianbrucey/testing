<?php

namespace App\Http\Livewire;

use App\Models\Game;
use Livewire\Component;

class Games extends Component
{

    public $games;

    public function mount($games) {
        $this->games = $games;
    }
    public function render()
    {
        return view('livewire.games', [
            'games' => $this->games
        ]);
    }
}
