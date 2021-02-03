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
        DB::insert('insert into officers ( office_name, job_role, hospital_id, username)
         values (?, ?,?,?)', [$request->office_name, 'General', 89, $request->username]);
        return redirect('/');

    }
    public function show(){
        $officers = Officer::all();
        return $officers;

    }


}
