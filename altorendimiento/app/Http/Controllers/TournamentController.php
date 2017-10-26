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
use Illuminate\Support\Facades\DB;

use App\Tournament;
use App\Season;
use App\Player;

use Log;


class TournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::with('season')->paginate(5);
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
            return redirect()->route('tournaments.index')->with('info', 'Torneo creado satisfactoriamente');
    }

    public function show($id)
    {
        $tournament = Tournament::with('season')->find($id);
        $allPlayers = Player::where('club_id','=',Auth::user()->club_id)->get();

        $returnPlayers = [];
        if(count($allPlayers)>0){
            foreach ($allPlayers as $allPlayer){
                foreach ($tournament->players as $player){
                    if($allPlayer->id == $player->id){
                        $allPlayer->player_number = $player->pivot->player_number;
                        array_push($returnPlayers,$allPlayer);
                        break;
                    }
                }
            }
            unset( $tournament->players);
            $allPlayers = $returnPlayers;
        }
        return view('tournament.tournament_detail',compact('tournament','allPlayers'));
    }


    public function edit($id)
    {
        $tournament = Tournament::with(['players','season'])->find($id);

        $seasons = Season::orderBy('updated_at')->get();
        $allPlayers = Player::where('club_id','=',Auth::user()->club_id)->get();

        if(count($allPlayers)>0){
            foreach ($allPlayers as $allPlayer){
                $addDefaultValues = true;
                foreach ($tournament->players as $player){
                    if($allPlayer->id == $player->id){
                        $allPlayer->is_checked = 1;
                        $allPlayer->player_number = $player->pivot->player_number;
                        $addDefaultValues = false;
                        break;
                    }
                }
                if($addDefaultValues){
                    $allPlayer->is_checked = 0;
                    $allPlayer->player_number = null;
                }
            }
            unset( $tournament->players);
        }
        return view('tournament.tournament_edit',compact('tournament','seasons','allPlayers'));
    }


    public function update(Request $request, $id)
    {
            $tournament = Tournament::find($id);
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

            return redirect()->route('tournaments.index')->with('info', 'Torneo creado satisfactoriamente');;

    }


    public function destroy($id)
    {
        //
    }
}