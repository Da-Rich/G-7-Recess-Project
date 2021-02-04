<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HospitalsController extends Controller
{
    //
    public function index(){
        return view('register.hospital');
    }
    public function store(Request $request){

        DB::table('hospitals')->insert([
            'hospital_name'=>$request->hospital_name,
            'hospital_category' => $request->hospital_category
                //'district' => $request->district
            ]);
            return 'Success!';
    }
}
