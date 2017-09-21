<?php

namespace App\Http\Controllers;

use App\Season;
use Illuminate\Http\Request;
use Log;

class SeasonController extends Controller
{

    public function index()
    {
        $seasons = Season::get();
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
        $season->club_id = 1;

        $season->save();

        return redirect()->route('seasons.index');
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
        $season->club_id = 1;
        $season->save();
        return redirect()->route('seasons.index');
    }

    public function destroy($id)
    {

    }
}
