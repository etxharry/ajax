<?php

namespace App\Http\Controllers;

use App\Models\Ajax;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index(){

        $add = Ajax::get();

        return view('index', compact('add'));
    }

    public function add(){

        return view('add');
    }

    public function store(Request $request){

        $add = new Ajax();

        $add->username = $request->username;
        $add->email = $request->email;
        $add->password = $request->password;

        $add->save();

        return redirect(route('user.show'));
    }

    public function edit($id){

        $add = Ajax::find($id);
        return view('edit', compact('add'));

    }

    public function update(Request $request, $id){

        $id = $request->id;

        $add = Ajax::find($id);

        $add->username = $request->username;
        $add->email = $request->email;
       // $add->password = $request->password;

        $add->save();

        return redirect(route('user.show'));
    }

    public function delete($id){

        $category = Ajax::findOrFail($id);

        $category->delete();

        return redirect(route('user.show'));
    }

}

