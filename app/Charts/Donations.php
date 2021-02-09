<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Donations extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */

     public function handler(Request $request): Chartisan
    {


        $donations = DB::table('donations')->get();

        return Chartisan::build()
            ->labels($this->donors_names($donations))
            ->dataset('money', $this->donation_amount($donations));
    }


public function donors_names($donations_array){
    $donors = array();
    foreach($donations_array as $donation){
        array_push($donors,$donation->donor_name);
    }
    //print_r($donors);
    return  $donors;
}
public function donation_amount($donations_array){
    $amount = array();
    foreach($donations_array as $donation){
        array_push($amount,$donation->amount);
    }
    return $amount;
}
}
