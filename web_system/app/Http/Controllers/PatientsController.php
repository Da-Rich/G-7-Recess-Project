<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientsModel;
use Illuminate\Support\Facades\DB;

class PatientsController extends Controller
{
    //
    public function total($array1, $array2, $array3){
        return count($array1)+count($array2)+count($array3);
    }
    public function index(){
        //totalpatients
        $patients_total = $this->total(DB::table('patients_details_generals')->get(),
        DB::table('patients_details_referals')->get(),
        DB::table('patients_details_nationals')->get()
    );
        
        //patientGeneraltable
        $patients_general =  DB::table('patients_details_generals')
        ->join('health_officers_generals', 'patients_details_generals.officer_id', 'health_officers_generals.id')
        ->select('patients_details_generals.*', 'health_officers_generals.officer_name', 'health_officers_generals.hospital_name')
        ->paginate(5);

        //patientReferal
        $patients_referal =  DB::table('patients_details_referals')
        ->join('health_officers_referals', 'patients_details_referals.officer_id', 'health_officers_referals.id')
        ->select('patients_details_referals.*', 'health_officers_referals.officer_name', 'health_officers_referals.hospital_name')
        ->paginate(5);

         //patientNational
         $patients_national =  DB::table('patients_details_nationals')
         ->join('health_officers_nationals', 'patients_details_nationals.officer_id', 'health_officers_nationals.id')
         ->select('patients_details_nationals.*', 'health_officers_nationals.officer_name', 'health_officers_nationals.hospital_name')
         ->paginate(5);
 

        return view ('enrolledpatientlist',
    ['patients_general'=>$patients_general,
    'patients_referals'=>$patients_referal,
    'patients_nationals'=> $patients_national,
    'patients_total'=>$patients_total
    ]);
    }
}
