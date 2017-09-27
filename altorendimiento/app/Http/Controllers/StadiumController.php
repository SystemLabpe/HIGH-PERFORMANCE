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

use App\Stadium;


use Log;

class StadiumController extends Controller
{
    public function index()
    {
        $stadiums = Stadium::get();
        return view('stadium.stadium_list', compact('stadiums'));
    }


    public function create()
    {
        return view('stadium.stadium_add');
    }

    public function store(Request $request)
    {
        $stadium = new Stadium();
        $stadium->name = $request->name;
        $stadium->club_id = Auth::user()->club_id;
        $stadium->save();

        return redirect()->route('stadiums.index');
    }

    public function show($id)
    {
        $stadium = Stadium::find($id);
        return view('stadium.stadium_detail',compact('stadium'));
    }


    public function edit($id)
    {
        $stadium = Stadium::find($id);
        return view('stadium.stadium_edit',compact('stadium'));
    }


    public function update(Request $request, $id)
    {
        $stadium = Stadium::find($id);
        $stadium->name = $request->name;
        $stadium->club_id = Auth::user()->club_id;
        $stadium->save();
        return redirect()->route('stadiums.index');
    }


    public function destroy($id)
    {
        //
    }

}