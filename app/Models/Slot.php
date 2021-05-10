<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Slot extends Model
{
    use HasFactory; use Notifiable;

    const CONFIRMED = 1;
    const NOT_CONFIRMED = 0;
    const WINNER_TAKE_ALL = 3;

    protected $fillable = [
        'id',
        'game_id',
        'game_product_id',
        'user_email',
        'board_number',
        'confirmed',
    ];

    public function game() {
        return $this->belongsTo(Game::class);
    }

    /**
     * @return User
     */
    public function user() {
        $user = User::where("email", $this->user_email)->first();
        return $user;
    }

    public function getSlotStatusMsg() {
        $status = "not confirmed";
        if($this->user_email) {
            $status = $this->user_email . " pending...";
            if($this->confirmed) {
                $status = $this->user_email . " confirmed";
            }
        }
        return $status;
    }

    public function getSlotStatusClass() {
        $status = "bg-gray-400";
        if($this->user_email) {
            $status = "bg-yellow-300";
            if($this->confirmed) {
                $status = "bg-green-400 text-white";
            }
        }
        return $status;
    }

}
