<?php

namespace App\Http\Controllers;

use App\Models\Donation;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DonationsController extends Controller
{
    public $months = array(
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    );
    //
    public function index(){
        return view('register.donation');
    }
    public function store(Request $request){

        //dd($request);
        DB::table('donations')->insert([
            'donor_name' =>$request->donor_name,
            'date' => $request->date,
            'amount' => $request->amount
        ]);
        return back()->withStatus(__('Donation successfully registered'));
    }
    public function chart(Request $request){

        dd($this->months);
        return view('charts.donations_chart');
    }
    public function charts_months(Request $request){
        return view('charts.donations_months_chart');
    }
    public function show(Request $request){
        ;
    }
}
