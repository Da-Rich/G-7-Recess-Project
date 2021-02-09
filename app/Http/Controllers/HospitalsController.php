<?php

namespace App\Http\Controllers;

use App\Models\Hospital;

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
            return back()->withStatus(__('Hospital successfully registered.'));
            //$hospitals=Hospital::all();
            //return view('tables.hospitals', compact('hospitals',$hospitals));
    }
    public function show(){

        $hospitals = Hospital::all();
        // $hospital_array = DB::table('hospitals')->join('officers',
        // 'hospitals.hospital_id', '=', 'officers.hospital_id')
        //     ->select('hospitals.hospital_category','officers.hospital_id',
        //     DB::raw('count(officers.hospital_id) as total'))
        //     ->groupBy('officers.hospital_id','hospitals.hospital_category')->get();
        return view('tables.hospitals', compact('hospitals',$hospitals));
            //DB::table('hospitals')->all();
    }

    public function show_hierarchy(){
        return view('pages.hierarchy');
    }

}
