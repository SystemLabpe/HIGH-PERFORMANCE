<?php
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 20/09/2017
 * Time: 11:46 PM
 */

namespace App;

use App\Tournament;
use Illuminate\Http\Request;
use Log;

class TournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::get();
        return view('tournament.tournament_list', compact('tournaments'));
    }


    public function create()
    {
        return view('tournament.tournament_add');
    }

    public function store(Request $request)
    {
        $tournament = new Tournament();
        $tournament->name = $request->name;
        $tournament->date_init = $request->date_init;
        $tournament->date_end = $request->date_end;
        $tournament->season_id = $request->season_id;
        $tournament->save();
        return redirect()->route('tournaments.index');
    }

    public function show($id)
    {
        $tournament = Tournament::find($id);
        return view('tournament.tournament_detail',compact('tournament'));
    }


    public function edit($id)
    {
        $tournament = Tournament::find($id);
        return view('$tournament.tournament_edit',compact('tournament'));
    }


    public function update(Request $request, $id)
    {
        $tournament = Tournament::find($id);
        $tournament->name = $request->name;
        $tournament->date_init = $request->date_init;
        $tournament->date_end = $request->date_end;
        $tournament->season_id = $request->season_id;
        $tournament->save();
        return redirect()->route('tournaments.index');
    }


    public function destroy($id)
    {
        //
    }
}