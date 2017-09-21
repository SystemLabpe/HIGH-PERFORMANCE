<?php
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 20/09/2017
 * Time: 9:55 PM
 */

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use Log;

class PlayerController extends Controller
{

    public function index()
    {
        $player = Player::get();
        return view('player_list', compact('seasons'));
    }


    public function create()
    {
        return view('player_add');
    }


    public function store(Request $request)
    {
        $season = new Player();
        $season->name = $request->name;
        $season->date_init = $request->date_init;
        $season->date_end = $request->date_end;
        $season->club_id = 1;

        $season->save();

        return redirect()->route('seasons.index');
    }


    public function show($id)
    {
        $season = Season::find($id);
        return view('/season_detail',compact('season'));
    }


    public function edit($id)
    {
        $season = Season::find($id);
        return view('/season_edit',compact('season'));
    }


    public function update(Request $request, $id)
    {
        $season = Season::find($id);
        $season->name = $request->name;
        $season->date_init = $request->date_init;
        $season->date_end = $request->date_end;
        $season->club_id = 1;
        $season->save();
        return view('/season_detail',compact('season'));
    }


    public function destroy(Season $season)
    {
        //
    }
}