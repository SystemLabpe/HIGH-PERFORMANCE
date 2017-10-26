<?php
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 26/10/2017
 * Time: 5:11 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Tactical;


use Log;

class TacticalController
{

    public function index()
    {
        $tacticals = Tactical::paginate(5);
        return view('tactical.tactical_list', compact('tacticals'));
    }


    public function create()
    {
        return view('tactical.tactical_add');
    }

    public function store(Request $request)
    {
        $tactical = new Tactical();
        $tactical->name = $request->name;
        $tactical->desc = $request->height;
        $tactical->tactical_type = $request->weight;
        $tactical->club_id = Auth::user()->club_id;
        $tactical->save();

        return redirect()->route('tacticals.index')->with('info', 'Tactica creada satisfactoriamente');
    }

    public function show($id)
    {
        $tactical = Tactical::find($id);
        return view('tactical.tactical_detail',compact('tactical'));
    }


    public function edit($id)
    {
        $tactical = Tactical::find($id);
        return view('tactical.tactical_edit',compact('tactical'));
    }


    public function update(Request $request, $id)
    {
        $tactical = Tactical::find($id);
        $tactical->name = $request->name;
        $tactical->desc = $request->height;
        $tactical->tactical_type = $request->weight;
        $tactical->club_id = Auth::user()->club_id;
        $tactical->save();
        return redirect()->route('tacticals.index')->with('info', 'Tactica editada satisfactoriamente');
    }


    public function destroy($id)
    {
        //
    }

}