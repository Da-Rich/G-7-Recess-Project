@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h1 class="title">A brief view</h1>
        </div>
        <div class="card-body all-icons">
          <div class="row">
            <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
              <div class="font-icon-detail">
                {{-- <i class="tim-icons icon-alert-circle-exc">40</i> --}}
                <h4>20,000</h4>
                <hr>
                <h3>Cases</h3>
              </div>
            </div>
            <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
              <div class="font-icon-detail">
                {{-- <i class="tim-icons icon-align-center"></i> --}}
                <h4>500</h4>
                <hr>
                <h3>Officers</h3>
              </div>
            </div>
            <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
              <div class="font-icon-detail">
                {{-- <i class="tim-icons icon-align-left-2"></i> --}}
                <h4>155</h4>
                <hr>
                <h3>Hospitals</h3>
              </div>
            </div>
            <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
              <div class="font-icon-detail">
                {{-- <i class="tim-icons icon-app"></i> --}}
                <h4>13</h4>
                <hr>
                <h3>Promotions</h3>
              </div>
            </div>
            <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
              <div class="font-icon-detail">
                {{-- <i class="tim-icons icon-atom"></i> --}}
                <h4>2bn</h4>
                <hr>
                <h3>Balance</h3>
              </div>
            </div>
            <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                <div class="font-icon-detail">
                  {{-- <i class="tim-icons icon-atom"></i> --}}
                  <h4>200</h4>
                  <hr>
                  <h3>Payments</h3>
                </div>
              </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h1 class="card-title"> Hierachical Graph</h1>
        </div>
        <div class="card-body">
          <div class="table-responsiv">
        </div>
    </div>
    </div>
@endsection
