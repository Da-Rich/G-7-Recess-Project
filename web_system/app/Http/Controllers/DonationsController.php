<?php

namespace App\Http\Controllers;

use App\Models\Donation;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DonationsController extends Controller
{
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
        return "Success";
    }
    public function chart(Request $request){
        return view('charts.donations_chart');
    }
    public function charts_months(Request $request){
        return view('charts.donations_months_chart');
    }
}
