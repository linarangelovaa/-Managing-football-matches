<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Maatch;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Requests\MatchRequest;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Maatch::get();
        $teams = Team::get();
        return view('matches.index', compact('matches', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matches = Maatch::all();
        $teams = Team::all();
        return view('matches.create', compact('matches', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Maatch $match, Team $team)
    {/*
        $team1 = $request->teams;
        $player->name = $request->name;
        $player->birthdate = $request->birthdate;
        $player->team_id = reset($team1); */
        /* (int) $request->input('team1_id');
        (int) $request->input('team2_id'); */
        $match = new Maatch();
        $team1 = $request->teams;
        $team2 = $request->teams;
        $match->date = $request->date;
        $match->team1_id = reset($team1);
        $match->team2_id = last($team2);


        if ($match->save()) {
            return redirect()->route('matches.index')->with('success', 'Match added!');
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
    public function edit($id)
    {
        $teams = Team::all();
        $match = Maatch::find($id);

        return view('matches.edit', compact('match', 'teams', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MatchRequest $request, $id)
    {
        $teams = Team::all();
        $match = Maatch::find($id);
        $input = $request->all();

        $team1 = $request->input('team1_id');
        $team2 = $request->input('team2_id');
        $date = $request->input('date');


        $match->update($input);
        return redirect()->route('matches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Maatch::find($id)->delete();



        return redirect()->route('matches.index');
    }
}
