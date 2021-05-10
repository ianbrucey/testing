<?php

namespace App\Http\Livewire;

use App\Events\UpdateSlot;
use App\Models\Game;
use App\Models\Slot;
use Livewire\Component;

class SlotReservations extends Component
{
    public $game;
    public $nextSteps;
    public $selectionLimit;

    public function mount(Game $game)
    {
        $slotCount = Slot::where("user_email", auth()->user()->email)->where("game_id", $game->id)->get()->count();
        $this->game = $game;
        $this->nextSteps = $slotCount ? "/slot/next-steps/{$game->id}": "#";
        $this->selectionLimit = ($game->buy_in * 15 == $game->prize) ? Slot::WINNER_TAKE_ALL : -1;
    }

    public function reserveSlot($slotId) {
        if($this->selectionLimit == 0) {
            $this->emit("limitReached");
            return;
        }
        $slot = Slot::find($slotId);
        if(!$slot->user_email) {

            $slot->user_email = auth()->user()->email;
            $slot->save();

            ++$this->game->check_ins;
            if($this->game->check_ins == 15) {
                $this->game->status = Game::STATUS_PENDING_CONFIRMATIONS;
            }

            $this->game->save();

            $this->nextSteps = "/slot/next-steps/{$this->game->id}";
            $this->emit("numberSelected", ['limit' => $this->selectionLimit]);
            --$this->selectionLimit;

            UpdateSlot::dispatch($this->game);

            // broadcast to lobby

            return;
        } else {
            $this->emit("numberFilled");
            return;
        }
    }



    public function render()
    {
        return view('livewire.slot-reservations', [
            'game' => $this->game,
            'slots' => Slot::where("game_id", $this->game->id)->get(),
            'closed' => true,
        ]);
    }
}
