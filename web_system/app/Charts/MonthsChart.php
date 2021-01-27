<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MonthsChart extends BaseChart
{
   
    protected function fetchMonth():array{
        $result = DB::table('register_donor_money')->get();
       $getMonth = array();
       foreach($result as $results){
           array_push($getMonth, $results->month);
       }
       return $getMonth;

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
        if(count($this->fetchMonth())){
            return Chartisan::build()
            ->labels($this->fetchMonth())
            ->dataset('month', $this->fetchAmount());

        }
        else{
            return Chartisan::build()
            ->labels(['first', 'second', 'third', 'four'])
            ->dataset('month', [1, 2, 3, 4]);

        }
    

    }
}