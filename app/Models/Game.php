<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    const STATUS_WAITING_FOR_PLAYERS = 0;
    const STATUS_PENDING_CONFIRMATIONS = 1;
    const STATUS_VENDOR_TO_START = 2;
    const STATUS_IN_PROGRESS = 3;
    const STATUS_COMPLETED = 4;

    const STATUS_DISPLAY_MSG = [
        self::STATUS_WAITING_FOR_PLAYERS => "Open",
        self::STATUS_PENDING_CONFIRMATIONS => "Pending confirmations",
        self::STATUS_VENDOR_TO_START => "Waiting for vendor to start",
        self::STATUS_IN_PROGRESS => "Game in Progress",
        self::STATUS_COMPLETED => "Completed",
    ];

    const STATUS_DISPLAY_COLOR = [
        self::STATUS_WAITING_FOR_PLAYERS => "text-blue-500",
        self::STATUS_PENDING_CONFIRMATIONS => "text-yellow-500",
        self::STATUS_IN_PROGRESS => "text-green-500",
        self::STATUS_COMPLETED => "text-red-700",
    ];


    protected $fillable = [
        'id',
        'user_id',
        'product_name',
        'product_url',
        'product_image_url',
        'product_id',
        'post_id',
        'buy_in',
        'prize',
        'status',
        'check_ins',
        'winner'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * @return Slot[]
     */
    public function slots() {
        return Slot::where("game_id", $this->id)->get();
    }

    /**
     * @return boolean
     */
    public function isGameOwner() {
        return auth()->id() === $this->user_id;
    }

    /**
     * @return boolean
     */
    public function isGamePlayer() {
        $userEmail = auth()->user()->email;
        $slots = Slot::where("game_id", $this->id)->get();
        foreach ($slots as $slot) {
            if($slot->user_email == $userEmail) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return boolean
     */
    public function isGameParticipant() {

        if($this->isGameOwner()) {
            return true;
        } elseif ($this->isGamePlayer()) {
            return true;
        }

        return false;
    }


}
