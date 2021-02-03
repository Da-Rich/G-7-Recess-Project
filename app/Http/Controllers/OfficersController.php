<?php

namespace App\Http\Controllers;

use App\Models\Officer;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class OfficersController extends Controller
{
    public function index(){
        return view('register.officer');
    }//
    public function store(Request $request){
        //dd($request);
        DB::insert('insert into officers (username) values (?)', [$request->office_name]);
        return redirect('/');
    }


}
