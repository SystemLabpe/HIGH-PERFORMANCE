<?php
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 6/11/2017
 * Time: 8:03 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Club;


use Log;

class UserController extends Controller
{

    public function index()
    {
        $administrators = User::with('club')->paginate(10);
        return view('admin.admin_list', compact('administrators'));
    }


    public function create()
    {
        $clubs = Club::get();

        return view('admin.admin_add',compact('clubs'));
    }

    public function store(Request $request)
    {
        $administrator = new User();
        $administrator->first_name = $request->first_name;
        $administrator->last_name = $request->last_name;
        $administrator->email = $request->email;
        $administrator->password = Hash::make($request->password);
        $administrator->role_id = 2;
        $administrator->club_id = $request->club_id;
        $administrator->save();

        return redirect()->route('administrators.index')->with('info', 'Entrenador creado satisfactoriamente');
    }

    public function show($id)
    {
        $administrator = User::find($id);
        return view('admin.admin_detail',compact('administrator'));
    }


    public function edit($id)
    {
        $administrator = User::find($id);
        $clubs = Club::get();
        return view('admin.admin_edit',compact('administrator','clubs'));
    }


    public function update(Request $request, $id)
    {
        $administrator = User::find($id);
        $administrator->first_name = $request->first_name;
        $administrator->last_name = $request->last_name;
        $administrator->email = $request->email;
        $administrator->password = Hash::make($request->password);
        $administrator->role_id = 2;
        $administrator->club_id = $request->club_id;
        $administrator->save();
        return redirect()->route('administrators.index')->with('info', 'Entrenador editado satisfactoriamente');;;
    }


    public function destroy($id)
    {
        //
    }

}