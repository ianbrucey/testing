<?php

namespace App\Http\Controllers;

use App\Events\UpdateSlot;
use App\Models\Game;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{

    public function nextSteps(Game $game)
    {
        $slots = Slot::where("user_email", auth()->user()->email)->where("game_id", $game->id)->get();
        $link = $game->product_url . "?quantity=" . $slots->count();
        $numbers = "";
        foreach ($slots as $slot) {
            $numbers .= sprintf("%s | ", $slot->board_number);
        }
        return view("slots.next-steps",[
            'numbers' => $numbers,
            'link' => $link
        ]);
    }

    /**
     * API CALL
     */
    public function confirmSlot(Request $request, $product_id) {
        $email = $request->email;
        $access = $request->access;

        if(!$email || !$product_id || !$access) {
            return response(['error' => "incomplete"], 400);
        } elseif ($access != env('TOKEN_FROM_WP')) {
            return response(['error' => "no"], 403);
        }

        $game = Game::where("product_id", $product_id)->where("status", "!=", 3)->first();

        if(!$game) {
            return response(['error' => "closed"], 404);
        }

        $slotsToConfirm = Slot::where("game_id", $game->id)->where("user_email", $email)->get();

        foreach ($slotsToConfirm as $slot) {
            $slot->confirmed = 1;
            $slot->save();
            UpdateSlot::dispatch($game);
            // broadcast to lobby
        }

        $slots = Slot::where("game_id", $game->id)->where("confirmed", 1)->get()->count();
        if($slots == 15) {
            $game->status = GAME::STATUS_IN_PROGRESS;
            // broadcast to lobby
        }
        // emit
        return response(['success' => "Confirmed"], 200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = Game::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
