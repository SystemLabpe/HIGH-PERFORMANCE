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
        $tournaments = Tournament::with('season')->get();
        return view('tournament.tournament_list', compact('tournaments'));
    }


    public function create()
    {
        $seasons = Season::orderBy('updated_at')->get();
        $allPlayers = Player::where('club_id','=',Auth::user()->club_id)->get();
        return view('tournament.tournament_add',compact('seasons','allPlayers'));
    }

    public function store(Request $request)
    {
        $tournament = new Tournament();
        $tournament->name = $request->name;
        $tournament->date_init = $request->date_init;
        $tournament->date_end = $request->date_end;
        $tournament->season_id = $request->season_id;
        $tournament->save();

        if(count($request->allPlayers)>0){
            $pivot = [];
            foreach ($request->allPlayers as $player){
                $player = (object)$player;
                if(array_key_exists('is_checked',$player)){
                    $pivot[$player->id] = ['player_number'=>$player->player_number] ;
                }
            }
            $tournament->players()->sync($pivot);
        }
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
        Log::info($tournament);
        if(count($tournament->players)>0){
            $players_id = [];
            foreach ($tournament->players as $player){
                array_push($players_id,$player->id);
            }
            $tournament->players = $players_id;
//            unset( $tournament->players);
        }


        $allPlayers = Player::where('club_id','=',Auth::user()->club_id)->get();

        $seasons = Season::orderBy('updated_at')->get();

        return view('tournament.tournament_edit',compact('tournament','seasons','allPlayers'));
    }


    public function update(Request $request, $id)
    {
        $tournament = Tournament::find($id);
        $tournament->name = $request->name;
        $tournament->date_init = $request->date_init;
        $tournament->date_end = $request->date_end;
        $tournament->season_id = $request->season_id;
        $tournament->player_number = '10';
        $tournament->save();

        if(count($request->allplayers)>0){
            $pivot = [];
            foreach ($request->allplayers as $player){
                $player = (object)$player;
                if(array_key_exists('is_checked',$player)){
                    $pivot[$player->id] = ['player_number'=>$player->player_number] ;
                }
            }
            $tournament->players()->sync($pivot);
        }

        return redirect()->route('tournaments.index');
    }


    public function destroy($id)
    {
        //
    }
}