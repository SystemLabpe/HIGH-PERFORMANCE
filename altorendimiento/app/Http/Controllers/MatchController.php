<?php
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 27/09/2017
 * Time: 12:35 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Match;
use App\Tournament;
use App\Rival_Team;
use App\Stadium;


use Log;

class MatchController extends Controller
{
    public function index()
    {
        $matchs = Match::with(['tournament','rival_team','stadium'])->get();
        return view('match.match_list', compact('matchs'));
    }


    public function create()
    {
        $tournaments = Tournament::with('season')->orderBy('updated_at')->get();
        $rival_teams = Rival_Team::where('club_id','=',Auth::user()->club_id)->get();
        $stadiums = Stadium::where('club_id','=',Auth::user()->club_id)->get();
        $allPlayers = Player::where('club_id','=',Auth::user()->club_id)->get();
        return view('match.match_add',compact('tournaments','rival_teams','stadiums','allPlayers'));
    }

    public function store(Request $request)
    {
        $match = new Match();
        $match->match_date = $request->name;
        $match->is_local = $request->date_init;
        $match->local_store = $request->date_end;
        $match->visitor_score = $request->tournament_id;
        $match->visitor_score = $request->rival_team_id;
        $match->visitor_score = $request->stadium_id;
        $match->save();

        if(count($request->allPlayers)>0){
            $pivot = [];
            foreach ($request->allPlayers as $player){
                $player = (object)$player;
                if(array_key_exists('is_checked',$player)){
                    $pivot[$player->id] = [
                        'good_pass'=>$player->good_pass,
                        'bad_pass'=>$player->bad_pass,
                        'short_pass'=>$player->short_pass,
                        'medium_pass'=>$player->medium_pass,
                        'long_pass'=>$player->long_pass,
                        'internal_edge'=>$player->internal_edge,
                        'external_edge'=>$player->external_edge,
                        'instep'=>$player->instep,
                        'taco'=>$player->taco,
                        'tigh'=>$player->tigh,
                        'chest'=>$player->chest,
                        'head'=>$player->head
                    ] ;
                }
            }
            $match->players()->sync($pivot);
        }
        return redirect()->route('matchs.index');
    }

    public function show($id)
    {
        $match = Match::with(['tournament','rival_team','stadium'])->find($id);

        $allPlayers = Player::where('club_id','=',Auth::user()->club_id)->get();

        $returnPlayers = [];
        if(count($allPlayers)>0){
            foreach ($allPlayers as $allPlayer){
                foreach ($match->players as $player){
                    if($allPlayer->id == $player->id){
                        $allPlayer->player_number = $player->pivot->player_number;
                        array_push($returnPlayers,$allPlayer);
                        break;
                    }
                }
            }
            unset( $match->players);
            $allPlayers = $returnPlayers;
        }
        return view('match.match_detail',compact('match','allPlayers'));
    }


    public function edit($id)
    {
        $match = Match::with(['tournament','rival_team','stadium','players'])->find($id);

        $tournaments = Tournament::with('season')->orderBy('updated_at')->get();
        $rival_teams = Rival_Team::where('club_id','=',Auth::user()->club_id)->get();
        $stadiums = Stadium::where('club_id','=',Auth::user()->club_id)->get();
        $allPlayers = Player::where('club_id','=',Auth::user()->club_id)->get();

        if(count($allPlayers)>0){
            foreach ($allPlayers as $allPlayer){
                $addDefaultValues = true;
                foreach ($match->players as $player){
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
            unset( $match->players);
        }
        return view('match.match_edit',compact('match','tournaments','rival_teams','stadiums','allPlayers'));
    }


    public function update(Request $request, $id)
    {
        $match = Tournament::find($id);
        $match->match_date = $request->name;
        $match->is_local = $request->date_init;
        $match->local_store = $request->date_end;
        $match->visitor_score = $request->tournament_id;
        $match->visitor_score = $request->rival_team_id;
        $match->visitor_score = $request->stadium_id;
        $match->save();

        if(count($request->allPlayers)>0){
            $pivot = [];
            foreach ($request->allPlayers as $player){
                $player = (object)$player;
                if(array_key_exists('is_checked',$player)){
                    $pivot[$player->id] = [
                        'good_pass'=>$player->good_pass,
                        'bad_pass'=>$player->bad_pass,
                        'short_pass'=>$player->short_pass,
                        'medium_pass'=>$player->medium_pass,
                        'long_pass'=>$player->long_pass,
                        'internal_edge'=>$player->internal_edge,
                        'external_edge'=>$player->external_edge,
                        'instep'=>$player->instep,
                        'taco'=>$player->taco,
                        'tigh'=>$player->tigh,
                        'chest'=>$player->chest,
                        'head'=>$player->head
                    ] ;
                }
            }
            $match->players()->sync($pivot);
        }
        return redirect()->route('matchs.index');
    }


    public function destroy($id)
    {
        //
    }
}