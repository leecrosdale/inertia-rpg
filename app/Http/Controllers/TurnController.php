<?php

namespace App\Http\Controllers;

use App\Player;
use App\Turn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TurnController extends Controller
{


    public function signup()
    {

        return Inertia::render('Index');

    }

    public function attack(Player $player)
    {

        $userPlayer = Auth::user()->player;
        // Damage
        $damage = ($userPlayer->attack * random_int($userPlayer->level, $userPlayer->level + 30)) - ($player->defence * random_int($player->level, $player->level + 30));


        $player->health -= $damage;


        if ($player->health <= 0) {

            $player->deaths++;
            $userPlayer->kills++;

            $text = "You attacked for {$damage} damage, KILLING THEM!";

        }

        if ($damage > 0) {
            $userPlayer->experience += $damage / random_int(2,12);

            $text = "You attacked for {$damage} damage";

        } else if ($damage < 0)
        {
            $userPlayer->health -= ($damage * -1);

            $text = "{$player->username} parried your attack and hit you with {$damage}!";
        }


        if ($userPlayer->health <= 0)
        {
            $userPlayer->deaths++;
            $player->kills++;
            $player->experience += $damage / random_int(2,12);


            $text .= "KILLING YOU!!";

        }


        if ($player->experience > $player->level * 10) {
            $player->attack += random_int(1,3);
            $player->defence += random_int(1,3);
            $player->level++;

            $text .= ' Enemy levelled up!';

        };

        if ($userPlayer->experience > $userPlayer->level * 10) {
            $userPlayer->attack += random_int(1,3);
            $userPlayer->defence += random_int(1,3);
            $userPlayer->level++;

            $text .= ' YOU LEVELLED UP!';
        };



        $userPlayer->save();
        $player->save();



        return dd($text);



    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $players = Player::all();
        $player = Auth::user()->player;

        return Inertia::render('Turns/Turn', ['players' => $players, 'player' => $player]);
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
     * @param  \App\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function show(Turn $turn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function edit(Turn $turn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turn $turn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turn $turn)
    {
        //
    }
}
