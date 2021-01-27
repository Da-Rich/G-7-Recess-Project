<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraphsController extends Controller
{
    //
    public function index(){
        return view('graphs');
    }
}
