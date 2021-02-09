<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function show(){
        return "hehe";
    }
    public function make_payments($money){
        $director_salary;
        $superintendent_salary;
        $admin_salary;
        $officer_salary;
        $senior_salary;
        $head_salary;

        if($money<=100000000){
            //No payments to be made
        }
        else{
            //follow this
            $bonus=array();
            $salary = array();
            $balance=$money;
            //start with directors
            foreach($directors as $director){
                DB::table('users')->update('SET', 'salary','=',50000000)->where('director_id','=',$director['director_id']);
                $balance = $money-50000000;
            }

            //next are the officersController

        }
    }
}
