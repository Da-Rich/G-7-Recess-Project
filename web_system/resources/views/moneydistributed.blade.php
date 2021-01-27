@extends('layouts.app')

@section('content')
<style>
    .money_background{
        background: #bdc3c7;
        margin-top: -25px;
    }
    .tab{
        text-align: center;
        background: #1c478e;
        color:#fff;
        border-radius: 999px;
        width: 100%;
        padding: 8px;
        font-weight: 800;
    }
    .tab-money{
        text-align: center;
        background:black;
        color:#fff;
        border-radius: 999px;
        width: 100%;
        padding: 10px;
        height: fit-content;
        font-weight: 900;

    }
    .footer{
        margin-top: 4rem;
        padding: 10px;
        text-align: center;
    }
    .footer>a{
        text-decoration:none;

        cursor: pointer;
        font-weight: bold;
    }
    table.table.table-striped.table-dark:hover{
        cursor: pointer !important;
    }
    small{
        font-weight: bold;
    }
    .inputs{
      display: flex;
      flex-direction: column;
    }
    .inputs>input{
      width: 100%;
      flex: 1;
    }
    }
    span.invalid-feedback{
        text-align: center !important;
    }
    .invalid{
        color:#e3342f !important;
    }
    .form-group{
        display: flex !important;
        flex-direction: column ;
        flex: 1;
    }
    button.btn.btn-primary{
        flex: 1 !important;
        background: #1c478e !important;
        margin-left: 10px !important;
        margin-right: 8px !important;
    }
    .label{
      text-align: center;
      font-weight: bold;
      margin-top:12px;
      padding-top: 15px;

    }


</style>
<div class="money_background">
    <div class="container mt-4"
    >
   
  <form method="POST" action="{{ route('money') }}" class="m-2">
    @csrf

    <div class="form-group  ">
      <div class="form-group row">
        <label for="role" class="label">{{ __('SelectMonth') }}</label>
        <div class="col-md-12">
            <select name="month" id="" class="form-control">
              @if (count($months))
              @foreach ($months as $month)
              <option value={{ $month->month }}>{{ $month->month }}</option>
          @endforeach
              @else
              <option value="January">January</option>
              @endif
              

            </select>
            
            @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
    <div class="form-group ml-6 mt-2">
            <button type="submit" class="btn btn-primary">
                {{ __('SelectMonth') }}
            </button>
        
    </div>
</form> 
        <div class="row justify-content-center">
            <div class="col-md-12 m-3">
                <p class="tab-money">MoneyDistributionIn 
                  @if ($default)
                      {{ $default }}
                  @endif
                </p>
            </div>
            <div class="col-md-12 mt-3">
                <p class="tab">MoneyDistributionToStaffMembers</p>
            </div>
            @if (count($staff_payments))
            <table class="table table-striped table-dark ">
                <thead>
                  <tr>
                    <th scope="col">StaffMemberName</th>
                    <th scope="col">StaffMemberRole</th>
                    <th scope="col">Payments</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($staff_payments as $payment)
                    <tr>
                        <th scope="row">{{ $payment->name }}</th>
                        <td>{{ $payment->role }}</td>
                        <td> <small>shs</small>{{  $payment->monthly_allowane }}</td>
                      </tr>
                    @endforeach  
                </tbody>
              </table>
            
            @else
            <div class="mt-5">
                <h2>There was no payements this month</h2>
            </div>
            @endif

            <div class="col-md-12 mt-3">
                <p class="tab-money">MoneyDistributionToHealthOfficers</p>
            </div>

            <div class="col-md-12 mt-3">
                <p class="tab">HealthOfficersAtGeneralHospitals</p>
            </div>
            @if (count($officers_at_general))
            <table class="table table-striped table-dark ">
                <thead>
                  <tr>
                    <th scope="col">OfficerName</th>
                    <th scope="col">OfficerRole</th>
                    <th scope="col">Payments</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($officers_at_general as $payment)
                    <tr>
                        <th scope="row">{{ $payment->officer_name }}</th>
                        <td>{{ $payment->role }}</td>
                        <td> <small>shs</small>{{  $payment->monthly_allowane }}</td>
                      </tr>
                    @endforeach  
                </tbody>
              </table>
            @else
            <div class="mt-5">
                <h2>There was no payements made for general officers this month</h2>
            </div>
            @endif
            <div class="col-md-12 mt-3">
                <p class="tab">HealthOfficersAtReferalHospitals</p>
            </div>
            @if (count($officers_at_referal))
            <table class="table table-striped table-dark ">
                <thead>
                  <tr>
                    <th scope="col">OfficerName</th>
                    <th scope="col">OfficerRole</th>
                    <th scope="col">Payments</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($officers_at_referal as $payment)
                    <tr>
                        <th scope="row">{{ $payment->officer_name }}</th>
                        <td>{{ $payment->role }}</td>
                        <td> <small>shs</small>{{  $payment->monthly_allowane }}</td>
                      </tr>
                    @endforeach  
                </tbody>
              </table>
            @else
            <div class="mt-5">
                <h2>There was no payements made for  officers in Referal Hospitals this month</h2>
            </div>
            @endif


            <div class="col-md-12 mt-3">
                <p class="tab">HealthOfficersAtNationalHospitals</p>
            </div>
            @if (count($officers_at_national))
            <table class="table table-striped table-dark ">
                <thead>
                  <tr>
                    <th scope="col">OfficerName</th>
                    <th scope="col">OfficerRole</th>
                    <th scope="col">Payments</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($officers_at_national as $payment)
                    <tr>
                        <th scope="row">{{ $payment->officer_name }}</th>
                        <td>{{ $payment->role }}</td>
                        <td> <small>shs</small>{{  $payment->monthly_allowane }}</td>
                      </tr>
                    @endforeach  
                </tbody>
              </table>
            @else
            <div class="mt-5">
                <h2>There was no payements made for  officers in National Hospitals this month</h2>
            </div>
            @endif

           

            

            
        </div>
        <div class="footer">
            <small>2021 All Rights Reserved</small>
            <a href="{{ route('home') }}">BackHome</a>
        </div>
    </div>
</div>

@endsection