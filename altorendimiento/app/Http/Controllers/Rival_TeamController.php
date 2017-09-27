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

use App\Rival_Team;


use Log;

class Rival_TeamController extends Controller
{

    public function index()
    {
        $rival_teams = Rival_Team::get();
        return view('rival_team.rival_team_list', compact('rival_teams'));
    }


    public function create()
    {
        return view('rival_team.rival_team_add');
    }

    public function store(Request $request)
    {
        $rival_team = new Rival_Team();
        $rival_team->name = $request->name;
//        $rival_team->picture = $request->picture;
        $rival_team->club_id = Auth::user()->club_id;
        $rival_team->save();

        return redirect()->route('rival_teams.index');
    }

    public function show($id)
    {
        $rival_team = Rival_Team::find($id);
        return view('rival_team.rival_team_detail',compact('rival_team'));
    }


    public function edit($id)
    {
        $rival_team = Rival_Team::find($id);
        return view('rival_team.rival_team_edit',compact('rival_team'));
    }


    public function update(Request $request, $id)
    {
        $rival_team = Player::find($id);
        $rival_team->name = $request->name;
//        $rival_team->picture = $request->picture;
        $rival_team->club_id = Auth::user()->club_id;
        $rival_team->save();
        return redirect()->route('rival_teams.index');
    }


    public function destroy($id)
    {
        //
    }

}