<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Requests\PlayerRequest;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::get();
        $teams = Team::get();

        return view('players.index', compact('players', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        $players = Player::all();
        return view('players.create', compact('teams', 'players'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Player $player)
    {/*
        dd($request->all()); */
        /*   $team = Team::find(1); */

        $player = new Player();
        $team1 = $request->teams;
        $player->name = $request->name;
        $player->birthdate = $request->birthdate;
        $player->team_id = reset($team1);

        if ($player->save()) {


            return redirect()->route('players.index')->with('success', 'Player added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $teams = Team::all();
        $player = Player::find($id);

        return view('players.edit', compact('player', 'teams', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlayerRequest $request, $id)
    {
        $teams = Team::all();
        $player = Player::find($id);
        $input = $request->all();

        $name = $request->input('name');
        $birthdate = $request->input('birthdate');
        $team_id = $request->input('team_id');


        $player->update($input);
        return redirect()->route('players.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Player::find($id)->delete();



        return redirect()->route('players.index');
    }
}
