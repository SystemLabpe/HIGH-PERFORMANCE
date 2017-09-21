<?php
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 20/09/2017
 * Time: 11:46 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Tournament;
use App\Season;
use App\Player;

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
        $seasons = Season::orderBy('updated_at')->get();
        $players = Player::where('club_id','=',Auth::user()->club_id)->get();
        return view('tournament.tournament_add',compact('seasons','players'));
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
        $tournament = Tournament::with('season')->find($id);
        $players = Player::where('club_id','=',Auth::user()->club_id)->get();
        return view('tournament.tournament_detail',compact('tournament','players'));
    }


    public function edit($id)
    {
        $tournament = Tournament::with(['players','season'])->find($id);
        $seasons = Season::orderBy('updated_at')->get();
        $players = Player::where('club_id','=',Auth::user()->club_id)->get();
        return view('$tournament.tournament_edit',compact('tournament','seasons','players'));
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