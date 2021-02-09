<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientsController extends Controller
{
    //
    public function index(){

    }
    public function variation(Request $request){
        return view('charts.enrollment');
    }
}
