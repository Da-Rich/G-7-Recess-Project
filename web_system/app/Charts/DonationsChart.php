<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonationsChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
     protected function fetchNames():array{
          $result = DB::table('register_donor_money')->get();
         $getDonerName = array();
         foreach($result as $results){
             array_push($getDonerName, $results->donor_name);
         }
         return $getDonerName;

     }
     protected function fetchAmount(){
        $result = DB::table('register_donor_money')->get();
        $getAmount = array();
        foreach($result as $results){
            array_push($getAmount,$results->amount);
        }
        return $getAmount;
     }
    


    public function handler(Request $request): Chartisan
    {
    
        if(count($this->fetchNames())){
            return Chartisan::build()
            ->labels($this->fetchNames())
            ->dataset('Well wishers', $this->fetchAmount());
        }

        else{
            return Chartisan::build()
            ->labels(['first', 'second', 'third', 'four'])
            ->dataset('Well wishers', [1, 2, 3, 4]);

        }

         

    }
}