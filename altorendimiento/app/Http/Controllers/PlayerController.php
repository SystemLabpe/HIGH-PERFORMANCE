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
use Illuminate\Support\Facades\Auth;
use Log;

class PlayerController extends Controller
{

    public function index()
    {
        $players = Player::get();
        return view('player.player_list', compact('players'));
    }


    public function create()
    {
        $user = Auth::user();
        Log::info($user);
        return view('player.player_add');
    }

    public function store(Request $request)
    {
        $player = new Player();
        $player->name = $request->name;
        $player->height = $request->height;
        $player->weight = $request->weight;
        $player->birth_date = $request->birth_date;
        $player->club_id = 1;
        $player->save();

        return redirect()->route('players.index');
    }

    public function show($id)
    {
        $player = Player::find($id);
        return view('player.player_detail',compact('player'));
    }


    public function edit($id)
    {
        $player = Player::find($id);
        return view('player.player_edit',compact('player'));
    }


    public function update(Request $request, $id)
    {
        $player = Player::find($id);
        $player->name = $request->name;
        $player->height = $request->height;
        $player->weight = $request->weight;
        $player->birth_date = $request->birth_date;
        $player->club_id = 1;
        $player->save();
        return redirect()->route('players.index');
    }


    public function destroy($id)
    {
        //
    }
}