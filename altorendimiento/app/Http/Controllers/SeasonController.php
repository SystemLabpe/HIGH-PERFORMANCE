<?php

namespace App\Http\Controllers;

use App\Season;
use Illuminate\Http\Request;
use Log;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = Season::get();
        return view('trainer.season_list', compact('seasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainer.season_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $season = Season::find($id);
        return view('trainer.season_detail',compact('season'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $season = Season::find($id);
        return view('trainer.season_edit',compact('season'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy(Season $season)
    {
        //
    }
}
