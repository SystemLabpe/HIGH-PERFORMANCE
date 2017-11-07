<?php
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 6/11/2017
 * Time: 8:03 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;


use Log;

class UserController extends Controller
{

    public function index()
    {
        $administrators = User::paginate(5);
        return view('player.player_list', compact('administrators'));
    }


    public function create()
    {
        return view('player.player_add');
    }

    public function store(Request $request)
    {
        $player = new Player();
        $player->name = $request->name;
        $player->height = $request->height;
        $player->weight = $request->weight;
        $player->birth_date = $request->birth_date;
        $player->club_id = Auth::user()->club_id;
        $player->save();

        return redirect()->route('players.index')->with('info', 'Jugador creado satisfactoriamente');
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
        $player->club_id = Auth::user()->club_id;
        $player->save();
        return redirect()->route('players.index')->with('info', 'Jugador editado satisfactoriamente');;;
    }


    public function destroy($id)
    {
        //
    }

}