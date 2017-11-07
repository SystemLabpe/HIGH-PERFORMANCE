<?php
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 6/11/2017
 * Time: 6:24 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Club;

class ClubController extends Controller {

    public function index()
    {
        $clubs = Club::paginate(5);
        return view('club.club_list', compact('clubs'));
    }


    public function create()
    {
        return view('club.club_add');
    }

    public function store(Request $request)
    {
        $club = new Club();
        $club->name = $request->name;
        $club->save();

        return redirect()->route('clubs.index')->with('info', 'Club creado satisfactoriamente');
    }

    public function show($id)
    {
        $club = Club::find($id);
        return view('club.club_detail',compact('club'));
    }


    public function edit($id)
    {
        $club = Club::find($id);
        return view('club.club_edit',compact('club'));
    }


    public function update(Request $request, $id)
    {
        $club = Club::find($id);
        $club->name = $request->name;
        $club->save();
        return redirect()->route('clubs.index')->with('info', 'Club editado satisfactoriamente');;;
    }


    public function destroy($id)
    {
        //
    }

}