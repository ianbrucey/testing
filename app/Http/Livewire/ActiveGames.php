<?php

namespace App\Http\Livewire;

use App\Models\Game;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ActiveGames extends Component
{
    public function render()
    {
        return view('livewire.active-games', [
            "games" => Game::where('status', Game::STATUS_WAITING_FOR_PLAYERS)->get()
        ]);
    }
}
