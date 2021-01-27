<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientsModel;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected  $general_officer_id;
    protected  $referal_officer_id;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //   public totalPatientsNumber(){

    //   }
    protected function officers_general_hospital(){
        return DB::table('health_officers_generals')
        ->join('patients_details_generals', 'health_officers_generals.id', '=',
         'patients_details_generals.officer_id')
        ->select('health_officers_generals.officer_name','health_officers_generals.id',
         'health_officers_generals.hospital_name',
 
        DB::raw('COUNT(patients_details_generals.officer_id) as total_patients_number')
        )
        ->groupBy('health_officers_generals.officer_name', 'health_officers_generals.id',
         'health_officers_generals.hospital_name')
       ->get();
    }
    protected function officers_referal_hospital(){
        return DB::table('health_officers_referals')
        ->join('patients_details_referals', 'health_officers_referals.id', '=',
         'patients_details_referals.officer_id')
        ->select('health_officers_referals.officer_name','health_officers_referals.id',
         'health_officers_referals.hospital_name',
  
        DB::raw('COUNT(patients_details_referals.officer_id) as total_patients_number')
        )
        ->groupBy('health_officers_referals.officer_name', 'health_officers_referals.id',
         'health_officers_referals.hospital_name')
       ->get();
    }
    protected function officers_national_hospital(){
        return 
        $officers_national_hospital =DB::table('health_officers_nationals')
        ->join('patients_details_nationals', 'health_officers_nationals.id', '=',
         'patients_details_nationals.officer_id')
        ->select('health_officers_nationals.officer_name','health_officers_nationals.id',
         'health_officers_nationals.hospital_name',
   
        DB::raw('COUNT(patients_details_nationals.officer_id) as total_patients_number')
        )
        ->groupBy('health_officers_nationals.officer_name', 'health_officers_nationals.id',
         'health_officers_nationals.hospital_name')
       ->get();
   
    }
    protected function check_general_treated_patients($officer_array){
          $treated_patients =  array_filter($officer_array,function($officers){
            if($officers->total_patients_number > 100){
                $this->general_officer_id = $officers->id;
                return $officers;
            }
           }
        );
        if(count($treated_patients)){
            $officer_total = DB::table('regional_hospitals')->min('officer_total');
            $hospital_details = DB::table('regional_hospitals')->where('officer_total', $this->general_officer_id)->get();
            $officer_details = DB::table('health_officers_generals')->where('id', '=', $this->general_officer_id)->get();
    
            //delete officer
           // DB::table('health_officers_generals')->where('id', '=', $this->general_officer_id)->delete();
            

           //insert 

           DB::table('health_officers_referals')->insert([
            'officer_name' =>$officer_details[0]->officer_name ,
            'role'=>'senior officer',
            'hospital_id'=>$hospital_details[0]->id,
            'user_id'=>1,
            'hospital_name'=>$hospital_details[0]->hospital_name
        ]);

        //increment regional hospital

        return 
        DB::table('regional_hospitals')->where('officer_total', '=', $officer_total)->increment('officer_total', 1);



        }
        else{
            return ;
        }
    }
    protected  function check_referal_table($officer_array){
        $treated_patients =  array_filter($officer_array,function($officers){
            if($officers->total_patients_number > 900){
                $this->referal_officer_id = $officers->id;
                return $officers;
            }
           }
        );
        if(count($treated_patients)){
        return 
        DB::table('health_officers_referals')
              ->where('id', $this->referal_officer_id)
              ->update([
                  'upgrade' => 'covid 19 consultant',
                   'award'=>'10000000',
                   'pending'=>True
              ]);



        }
        else{
            return ;
        }

    }
    protected function pendingOfficerList(){
        return DB::table('health_officers_referals')
        ->where('pending', True)
        ->get();
    }
   protected function format_currency($array_currency){
    return  array_map(function($currency){
        if($currency->award){
           $currency->award = number_format($currency->award, 2, '.', ',');
           $currency->pending = 'Yes';
           return $currency;
        }
        return $currency;
   }, $array_currency);
}
   
    public function index()
    {
      $officers_general_hospital =$this->officers_general_hospital();
      $officers_referal_hospital =  $this->officers_referal_hospital();
      $officers_national_hospital = $this->officers_national_hospital();
      $this->check_general_treated_patients($officers_general_hospital->toArray());
      $this->check_referal_table($officers_referal_hospital->toArray());
      $pendingList = $this->pendingOfficerList();
      $this->format_currency($pendingList->toArray());
       return view('home',
       [
        'officers_general'=>$officers_general_hospital,
        'officers_referal'=>$officers_referal_hospital,
        'officers_national'=>$officers_national_hospital,
        'officers_pending'=>$pendingList
       ]

    );
    }
}
