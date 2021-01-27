@extends('layouts.app')
@section('content')
<style>
    .grid{
        display: grid;
        place-items: center;
        height: 100vh;
        width: 100%;
        background-color: #dadbd3;
        box-shadow: -1px 4px 20px -9px rgba(0,0,0,0.8);
    }
    .shadow{

        width:70%;
        height: 80vh;
        background:#ededed;
        box-shadow: -1px 4px 20px -6px rgba(0,0,0,0.8);
        margin-bottom: 10px;

    }
    label.col-md-12.col-form-label{
        text-align: center !important;
        font-weight: bold;
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
    span.invalid-feedback{
        text-align: center !important;
    }
    
    .invalid{
        color:#e3342f !important;
    }
    .officer-created{
        font-weight: bold;
        text-align: center;
        padding: 12px;
        background: #1c478e;
        border: 1px solid #1c478e;
        border-radius: 999px;
        margin-top: -10px;
    }
    .officer-created>h4{
        color: #fff;
    }
    .remove-alert{
        display: none;
    }
    .footer{
        margin-top: -2rem;
    }
    .footer>a{
        text-decoration:none;
        cursor: pointer;
        font-weight: bold;
    }
</style>
<div class="container mt-5">
    <div class="grid">
        <div class="grid">
            @if (session('status'))
        <div class="officer-created" id="remove">
            <h4>
                {{ session('status') }}
            </h4>    
        </div>
        @endif
        <div class="shadow">
            <div class="h2 text-center mt-4 mb-5">
                <h3>Register</h3>
            </div>
            <form method="POST" action="{{ route('registerdonormoney') }}" class="m-5">
                @csrf

                <div class="form-group  ">
                    <label for="name" class="col-md-12 col-form-label
                    ">DonorName</label>

                    <div class="col-md-12">
                        <input id="name" type="name" 
                        class="form-control 
                        @error('donor_name') is-invalid
                         @enderror" name="donor_name" value="{{ old('donor_name') }}"
                          >

                        @error('donor_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            
                  
                <div class="form-group  ">
                    <label for="month" class="col-md-12 col-form-label
                    ">Month</label>

                    <div class="col-md-12">
                        <input id="month" type="month" 
                        class="form-control 
                        @error('month') is-invalid
                         @enderror" name="month" value="{{ old('month') }}"
                          >

                        @error('month')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                

                <div class="form-group mb-4 ">
                    <label for="name" class="col-md-12 col-form-label
                    ">Amount</label>

                    <div class="col-md-12">
                        <input id="name" type="name" 
                        placeholder="forexample 1000000 without commas"
                        class="form-control 
                        @error('amount') is-invalid
                         @enderror" name="amount" value="{{ old('amount') }}"
                          >

                        @error('amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group ml-6 mb-4 ">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    
                </div>
            </form>
        </div>
        <div class="footer">
            <small>2021 All Rights Reserved</small>
            <a href="{{ route('home') }}">BackHome</a>
        </div>
    </div>
</div>
</div>
<script>
    const getId = document.querySelector('#remove');
    //document.querySelector('.shadow').classList.add('margin-top')
    getId?(
       setTimeout(()=>{
          getId.classList.toggle('remove-alert')
       }, 10000)
    ):null
    
  </script>
   
@endsection