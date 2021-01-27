<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\HealthOfficer;
use App\Models\GeneralHospital;
use App\Models\NationalHospital;
use App\Models\RegionalHospital;

class RegisterHealthOfficer extends Controller
{
    //
    public function index(){
        return view('auth.registerofficer');
    }


    public function store(Request $request){
        $this->validate($request, 
        ['officer_name'=>'required']
    );
    $results_general = GeneralHospital::get();
    $findMin = array();
    if(count($results_general)===0 ){
        return back()->with('status', 'GeneralHospitals dont have data');
    }
        $general_hospital = array();
        foreach($results_general as $result){
            array_push($findMin, $result->officer_total);
        }
        sort($findMin);
        if($findMin[0] < 15){
            foreach($results_general as $result){
                $result->officer_total === $findMin[0]?
                array_push($general_hospital, $result)
                :
                null;
            }
            DB::table('general_hospitals')
            ->where('officer_total', '=', $findMin[0])->increment('officer_total', 1);

         $request->user()->registerOfficer()->create(
               [
                   'officer_name'=>$request->officer_name,
                   'hospital_id'=>$general_hospital[0]->id,
                   'hospital_name'=>$general_hospital[0]->hospital_name
    
               ]
               );
               return back()->with('status', $request->officer_name . ' registered successfully');
        }
        else{
            return back()->with('status', 'All hospitals are full');
        }

    }
}
