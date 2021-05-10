<?php

namespace App\Http\Livewire;

use App\Models\Game;
use App\Models\Slot;
use Livewire\Component;

class LobbySlots extends Component
{
    public $slots;

    public $game;

    public function mount(Game $game)
    {
        $this->game = $game;
        $this->slots = Slot::where("game_id", $game->id)->get();
    }

    public function reRenderSlots() {
        $this->slots = Slot::where("game_id", $this->game->id)->get();
    }

    public function getListeners()
    {
        return [
            "echo-private:update-slot.{$this->game->id},UpdateSlot" => 'reRenderSlots'
        ];
    }

    public function render()
    {
        return view('livewire.lobby-slots');
    }
}
