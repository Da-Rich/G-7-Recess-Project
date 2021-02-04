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

        // $request->validate([
        //     'office_name' => 'required',
        //     'username' => 'required',
        //     'job_role' => 'required'

        // ]);
        //dd($request);
       $grouped_hospitals  = $this->best_hospital();
       //create an array
       $new =  array_map(function($values){
           return array("hospital_id"=>$values->hospital_id,'category'=>$values->hospital_category,
           'total'=>$values->total);
       },
       $grouped_hospitals->toArray());

       usort($new, function($first,$second){
            return $first['total'] <=> $second['total'];
       });

       $hospital_id = $new[0]['hospital_id'];
        //print_r($new);



        DB::table('officers')->insert([
         'office_name'=>$request->officer_name,
         'username' => $request->username,
             'hospital_id' => $hospital_id
         ]);

        //('insert into officers ( office_name, job_role, hospital_id, username)
        //values (?, ?,?,?)', [$request->office_name, 'General', 89, $request->username]);
        return redirect('/registerOfficer');

    }

    public function show(){
         //$officers =  DB::table('officers')->get();
         $officers = Officer::all();

        return view('tables.officers', compact('officers',$officers));
        return (array)$officers;

    }
    public function best_hospital(){
        return DB::table('hospitals')->join('officers',
        'hospitals.hospital_id', '=', 'officers.hospital_id')
            ->select('officers.hospital_id','hospitals.hospital_category',
            DB::raw('count(officers.hospital_id) as total'))
            ->where('hospitals.hospital_category','=', 'general')
            ->groupBy('officers.hospital_id','hospitals.hospital_category')->get();


    }


}
