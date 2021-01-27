<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterDonorMoneyController extends Controller
{
    //
    protected function  getMonth($array_month, $number){
        foreach($array_month as $months=>$value){
            if((int)$value=== (int)$number)
            return $months;
        }
        return 'January';
     }
    public function index(){
        return view('auth.registerdonormoney');
    }
    public function store(Request $request){
        $this->validate($request, 
        ['donor_name'=>'required',
        'month'=>'required',
        'amount'=>'required']
    );
    $months_array = ['January'=>'1', 'February'=>'2', 'March'=>'3', 'April'=>'4',
    'May'=>'5', 'June'=>'6', 'July'=>'7', 'August'=>'8', 
    'September'=>'9', 'October'=>'10', 'November'=>'11', 'December'=>'12'];
    //dd($request);
    $expode = explode("-", $request->month, 2)[1];
    $request->user()->registerDonorMoney()->create(
        [
            'donor_name'=>$request->donor_name,
            'month'=>$this->getMonth($months_array, $expode),
            'amount'=>$request->amount

        ]
        );
        return back()->with('status', 'shs '. number_format($request->amount) . ' registered successfully');
    }
}
