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
use App\Player;


use Log;

class MatchController extends Controller
{
    public function index()
    {
        $matchs = Match::with(['tournament','rival_team','stadium'])->paginate(5);
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
        $match->match_date = $request->match_date;
        $match->is_local = $request->is_local;
        $match->local_score = $request->local_score;
        $match->visitor_score = $request->visitor_score;
        $match->tournament_id = $request->tournament_id;
        $match->rival_team_id = $request->rival_team_id;
        $match->stadium_id = $request->stadium_id;

        $match->save();

        if(count($request->allPlayers)>0){
            $pivot = [];
            foreach ($request->allPlayers as $player){
                $player = (object)$player;
                if(array_key_exists('is_checked',$player)){
                    $pivot[$player->id] = [
                        'match_tournament_id' => $request->tournament_id,
                        'match_rival_team_id' => $request->rival_team_id,
                    ] ;
                }
            }
            $match->players()->sync($pivot);
        }
        return redirect()->route('matchs.index')->with('info', 'Partido creado satisfactoriamente');
    }

//    public function store(Request $request)
//    {
//        $match = new Match();
//        $match->match_date = $request->match_date;
//        $match->is_local = $request->is_local;
//        $match->local_score = $request->local_score;
//        $match->visitor_score = $request->visitor_score;
//        $match->tournament_id = $request->tournament_id;
//        $match->rival_team_id = $request->rival_team_id;
//        $match->stadium_id = $request->stadium_id;
//
//        $match->save();
//
//        if(count($request->allPlayers)>0){
//            $pivot = [];
//            foreach ($request->allPlayers as $player){
//                $player = (object)$player;
//                if(array_key_exists('is_checked',$player)){
//                    $pivot[$player->id] = [
//                        'match_tournament_id' => $request->tournament_id,
//                        'match_rival_team_id' => $request->rival_team_id,
//                        'good_pass'=>$player->good_pass,
//                        'bad_pass'=>$player->bad_pass,
//                        'short_pass'=>$player->short_pass,
//                        'medium_pass'=>$player->medium_pass,
//                        'long_pass'=>$player->long_pass,
//                        'internal_edge'=>$player->internal_edge,
//                        'external_edge'=>$player->external_edge,
//                        'instep'=>$player->instep,
//                        'taco'=>$player->taco,
//                        'tigh'=>$player->tigh,
//                        'chest'=>$player->chest,
//                        'head'=>$player->head
//                    ] ;
//                }
//            }
//            $match->players()->sync($pivot);
//        }
//        return redirect()->route('matchs.index')->with('info', 'Partido creado satisfactoriamente');
//    }

    public function show($id)
    {
        $match = Match::with(['tournament','rival_team','stadium'])->find($id);

        $allPlayers = Player::where('club_id','=',Auth::user()->club_id)->get();

        $returnPlayers = [];
        if(count($allPlayers)>0){
            foreach ($allPlayers as $allPlayer){
                foreach ($match->players as $player){
                    if($allPlayer->id == $player->id){
                        $allPlayer->good_pass = $player->pivot->good_pass;
                        $allPlayer->bad_pass = $player->pivot->bad_pass;
                        $allPlayer->short_pass = $player->pivot->short_pass;
                        $allPlayer->medium_pass = $player->pivot->medium_pass;
                        $allPlayer->long_pass = $player->pivot->long_pass;
                        $allPlayer->internal_edge = $player->pivot->internal_edge;
                        $allPlayer->external_edge = $player->pivot->external_edge;
                        $allPlayer->instep = $player->pivot->instep;
                        $allPlayer->taco = $player->pivot->taco;
                        $allPlayer->tigh = $player->pivot->tigh;
                        $allPlayer->chest = $player->pivot->chest;
                        $allPlayer->head = $player->pivot->head;
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
        $match = Match::with(['tournament','rival_team','stadium'])->find($id);

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
                        $addDefaultValues = false;
                        break;
                    }
                }
                if($addDefaultValues){
                    $allPlayer->is_checked = 0;
                }
            }
            unset( $match->players);
        }
        return view('match.match_edit',compact('match','tournaments','rival_teams','stadiums','allPlayers'));
    }
//    public function edit($id)
//    {
//        $match = Match::with(['tournament','rival_team','stadium'])->find($id);
//
//        $tournaments = Tournament::with('season')->orderBy('updated_at')->get();
//        $rival_teams = Rival_Team::where('club_id','=',Auth::user()->club_id)->get();
//        $stadiums = Stadium::where('club_id','=',Auth::user()->club_id)->get();
//        $allPlayers = Player::where('club_id','=',Auth::user()->club_id)->get();
//
//        if(count($allPlayers)>0){
//            foreach ($allPlayers as $allPlayer){
//                $addDefaultValues = true;
//                foreach ($match->players as $player){
//                    if($allPlayer->id == $player->id){
//                        $allPlayer->is_checked = 1;
//                        $allPlayer->good_pass = $player->pivot->good_pass;
//                        $allPlayer->bad_pass = $player->pivot->bad_pass;
//                        $allPlayer->short_pass = $player->pivot->short_pass;
//                        $allPlayer->medium_pass = $player->pivot->medium_pass;
//                        $allPlayer->long_pass = $player->pivot->long_pass;
//                        $allPlayer->internal_edge = $player->pivot->internal_edge;
//                        $allPlayer->external_edge = $player->pivot->external_edge;
//                        $allPlayer->instep = $player->pivot->instep;
//                        $allPlayer->taco = $player->pivot->taco;
//                        $allPlayer->tigh = $player->pivot->tigh;
//                        $allPlayer->chest = $player->pivot->chest;
//                        $allPlayer->head = $player->pivot->head;
//                        $addDefaultValues = false;
//                        break;
//                    }
//                }
//                if($addDefaultValues){
//                    $allPlayer->is_checked = 0;
//                    $allPlayer->player_number = null;
//                    $allPlayer->good_pass = null;
//                    $allPlayer->bad_pass = null;
//                    $allPlayer->short_pass = null;
//                    $allPlayer->medium_pass = null;
//                    $allPlayer->long_pass = null;
//                    $allPlayer->internal_edge = null;
//                    $allPlayer->external_edge = null;
//                    $allPlayer->instep = null;
//                    $allPlayer->taco = null;
//                    $allPlayer->tigh = null;
//                    $allPlayer->chest = null;
//                    $allPlayer->head = null;
//                }
//            }
//            unset( $match->players);
//        }
//        return view('match.match_edit',compact('match','tournaments','rival_teams','stadiums','allPlayers'));
//    }

    public function update(Request $request, $id)
    {
        Log::info($request);
        $match = Match::find($id);
        $match->match_date = $request->match_date;
        $match->is_local = $request->is_local;
        $match->local_score = $request->local_score;
        $match->visitor_score = $request->visitor_score;
        $match->tournament_id = $request->tournament_id;
        $match->rival_team_id = $request->rival_team_id;
        $match->stadium_id = $request->stadium_id;

        if(count($request->allPlayers)>0){
            $pivot = [];
            foreach ($request->allPlayers as $player){
                $player = (object)$player;
                if(array_key_exists('is_checked',$player)){
                    $pivot[$player->id] = [
                        'match_tournament_id' => $request->tournament_id,
                        'match_rival_team_id' => $request->rival_team_id,
                    ] ;
                }
            }
            $match->players()->sync($pivot);
        }

        $match->save();
        return redirect()->route('matchs.index')->with('info', 'Partido editado satisfactoriamente');
    }


//    public function update(Request $request, $id)
//    {
//        Log::info($request);
//        $match = Match::find($id);
//        $match->match_date = $request->match_date;
//        $match->is_local = $request->is_local;
//        $match->local_score = $request->local_score;
//        $match->visitor_score = $request->visitor_score;
//        $match->tournament_id = $request->tournament_id;
//        $match->rival_team_id = $request->rival_team_id;
//        $match->stadium_id = $request->stadium_id;
//
//
//        // $match->save();
//
//        if(count($request->allPlayers)>0){
//            $pivot = [];
//            foreach ($request->allPlayers as $player){
//                $player = (object)$player;
//                if(array_key_exists('is_checked',$player)){
//                    $pivot[$player->id] = [
//                        'match_tournament_id' => $request->tournament_id,
//                        'match_rival_team_id' => $request->rival_team_id,
//                        'good_pass'=>$player->good_pass,
//                        'bad_pass'=>$player->bad_pass,
//                        'short_pass'=>$player->short_pass,
//                        'medium_pass'=>$player->medium_pass,
//                        'long_pass'=>$player->long_pass,
//                        'internal_edge'=>$player->internal_edge,
//                        'external_edge'=>$player->external_edge,
//                        'instep'=>$player->instep,
//                        'taco'=>$player->taco,
//                        'tigh'=>$player->tigh,
//                        'chest'=>$player->chest,
//                        'head'=>$player->head
//                    ] ;
//                }
//            }
//            $match->players()->sync($pivot);
//        }
//
//        $match->save();
//        return redirect()->route('matchs.index')->with('info', 'Partido editado satisfactoriamente');
//    }


    public function destroy($id)
    {
        //
    }

    public function editTechnicalPhysical($id)
    {
        $match = Match::with(['tournament','rival_team','stadium'])->find($id);
        $allPlayers = Player::where('club_id','=',Auth::user()->club_id)->get();

        if(count($allPlayers)>0){
            foreach ($allPlayers as $allPlayer){
                $addDefaultValues = true;
                foreach ($match->players as $player){
                    if($allPlayer->id == $player->id){
                        $allPlayer->is_checked = 1;
                        $allPlayer->good_pass = $player->pivot->good_pass;
                        $allPlayer->bad_pass = $player->pivot->bad_pass;
                        $allPlayer->short_pass = $player->pivot->short_pass;
                        $allPlayer->medium_pass = $player->pivot->medium_pass;
                        $allPlayer->long_pass = $player->pivot->long_pass;
                        $allPlayer->internal_edge = $player->pivot->internal_edge;
                        $allPlayer->external_edge = $player->pivot->external_edge;
                        $allPlayer->instep = $player->pivot->instep;
                        $allPlayer->taco = $player->pivot->taco;
                        $allPlayer->tigh = $player->pivot->tigh;
                        $allPlayer->chest = $player->pivot->chest;
                        $allPlayer->head = $player->pivot->head;

                        $allPlayer->d_short_distance = $player->pivot->d_short_distance;
                        $allPlayer->d_medium_distance = $player->pivot->d_medium_distance;
                        $allPlayer->d_long_distance = $player->pivot->d_long_distance;
                        $allPlayer->i_full_speed = $player->pivot->i_full_speed;
                        $allPlayer->i_semi_full_speed = $player->pivot->i_semi_full_speed;
                        $allPlayer->i_half_speed = $player->pivot->i_half_speed;
                        $allPlayer->i_walk = $player->pivot->i_walk;
                        $allPlayer->e_run = $player->pivot->e_run;
                        $allPlayer->e_jump = $player->pivot->e_jump;
                        $allPlayer->e_walk = $player->pivot->e_walk;
                        $allPlayer->e_stand = $player->pivot->e_stand;

                        $addDefaultValues = false;
                        break;
                    }
                }
                if($addDefaultValues){
                    $allPlayer->is_checked = 0;
                    $allPlayer->player_number = null;
                    $allPlayer->good_pass = null;
                    $allPlayer->bad_pass = null;
                    $allPlayer->short_pass = null;
                    $allPlayer->medium_pass = null;
                    $allPlayer->long_pass = null;
                    $allPlayer->internal_edge = null;
                    $allPlayer->external_edge = null;
                    $allPlayer->instep = null;
                    $allPlayer->taco = null;
                    $allPlayer->tigh = null;
                    $allPlayer->chest = null;
                    $allPlayer->head = null;

                    $allPlayer->d_short_distance = null;
                    $allPlayer->d_medium_distance = null;
                    $allPlayer->d_long_distance = null;
                    $allPlayer->i_full_speed = null;
                    $allPlayer->i_semi_full_speed = null;
                    $allPlayer->i_half_speed = null;
                    $allPlayer->i_walk = null;
                    $allPlayer->e_run = null;
                    $allPlayer->e_jump = null;
                    $allPlayer->e_walk = null;
                    $allPlayer->e_stand = null;
                }
            }
            unset( $match->players);
        }
        return view('match.match_technical_physical_tactic',compact('match','allPlayers'));
    }



    public function updateTechnicalPhysical(Request $request, $id)
    {
        $match = Match::find($id);

        if(count($request->allPlayers)>0){
            $pivot = [];
            foreach ($request->allPlayers as $player){
                $player = (object)$player;
                if(array_key_exists('is_checked',$player)){
                    $pivot[$player->id] = [
                        'match_tournament_id' => $request->tournament_id,
                        'match_rival_team_id' => $request->rival_team_id,
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

        return redirect()->route('match.index')->with('info', 'Aspecto Tactico/fisico editado satisfactoriamente');
    }

}