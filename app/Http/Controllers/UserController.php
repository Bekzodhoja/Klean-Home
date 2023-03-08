<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return "User Controller";
    }
    public function show($name)
    {
        $name += 300;
        return view('user.show',['name'=>'Bekzodxoja']);
    }
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        dd($request->input('_token'));
    }
}
