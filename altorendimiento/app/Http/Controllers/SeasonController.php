<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Season;

use Log;

class SeasonController extends Controller
{

    public function index()
    {
        $seasons = Season::paginate(5);
        return view('season.season_list', compact('seasons'));
    }

    public function create()
    {
        return view('season.season_add');
    }

    public function store(Request $request)
    {
        $season = new Season();
        $season->name = $request->name;
        $season->date_init = $request->date_init;
        $season->date_end = $request->date_end;
        $season->club_id = Auth::user()->club_id;
        $season->save();

        return redirect()->route('seasons.index')->with('info', 'Temporada creada satisfactoriamente');
    }

    public function show($id)
    {
        $season = Season::find($id);
        return view('season.season_detail',compact('season'));
    }

    public function edit($id)
    {
        $season = Season::find($id);
        return view('season.season_edit',compact('season'));
    }

    public function update(Request $request, $id)
    {
        $season = Season::find($id);
        $season->name = $request->name;
        $season->date_init = $request->date_init;
        $season->date_end = $request->date_end;
        $season->club_id = Auth::user()->club_id;
        $season->save();
        return redirect()->route('seasons.index')->with('info', 'Temporada editado satisfactoriamente');;
    }

    public function destroy($id)
    {

    }
}
