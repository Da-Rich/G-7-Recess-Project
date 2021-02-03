<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HospitalsController extends Controller
{
    //
    public function index(){
        return view('register.hospital');
    }
    public function store(Request $request){
        dd($request);
    }
}
