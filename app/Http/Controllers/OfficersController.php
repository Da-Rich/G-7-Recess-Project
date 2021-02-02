<?php

namespace App\Http\Controllers;

use App\Models\Officer;

use Illuminate\Http\Request;

class OfficersController extends Controller
{
    public function index(){
        return view('register.officer');
    }//
    public function store(Request $request){
        dd($request);
    }

}
