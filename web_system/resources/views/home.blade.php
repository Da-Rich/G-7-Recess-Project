@extends('layouts.app')
@section('content')
<style>
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
    .tab-red{
        text-align: center;
        background:#8b0000;
        color:#fff;
        border-radius: 999px;
        width: 100%;
        padding: 10px;
        height: fit-content;
        font-weight: 900;

    }
    table.table.table-striped.table-dark:hover{
        cursor: pointer !important;
    }
</style>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <p class="tab">OfficersByGeneralHospital</p>
        </div>
        @if (count($officers_general))
        <table class="table table-striped table-dark ">
            <thead>
              <tr>
                <th scope="col">OfficerName</th>
                <th scope="col">OfficerHospital</th>
                <th scope="col">TotalPatients</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($officers_general as $officer)
                <tr>
                    <th scope="row">{{ $officer->officer_name }}</th>
                    <td>{{ $officer->hospital_name }}</td>
                    <td>{{  $officer->total_patients_number }}</td>
                  </tr>
                @endforeach  
            </tbody>
          </table>
        @else
        <div class="mt-5">
            <h2>There are no officers in general hospitals yet</h2>
        </div>
        @endif

        <div class="col-md-12 mt-3">
            <p class="tab-money">OfficersByReferalHospital</p>
        </div>
        @if (count($officers_referal))
        <table class="table table-striped table-dark ">
            <thead>
              <tr>
                <th scope="col">OfficerName</th>
                <th scope="col">OfficerHospital</th>
                <th scope="col">TotalPatients</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($officers_referal as $officer)
                <tr>
                    <th scope="row">{{ $officer->officer_name }}</th>
                    <td>{{ $officer->hospital_name }}</td>
                    <td>{{  $officer->total_patients_number }}</td>
                  </tr>
                @endforeach  
            </tbody>
          </table>
        @else
        <div class="mt-5">
            <h2>There are no officers in  hospitals yet</h2>
        </div>
        @endif
        <div class="col-md-12 mt-3">
            <p class="tab">OfficersByReferalHospital</p>
        </div>
        @if (count($officers_national))
        <table class="table table-striped table-dark ">
            <thead>
              <tr>
                <th scope="col">OfficerName</th>
                <th scope="col">OfficerHospital</th>
                <th scope="col">TotalPatients</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($officers_national as $officer)
                <tr>
                    <th scope="row">{{ $officer->officer_name }}</th>
                    <td>{{ $officer->hospital_name }}</td>
                    <td>{{  $officer->total_patients_number }}</td>
                  </tr>
                @endforeach  
            </tbody>
          </table>
        @else
        <div class="mt-5">
            <h2>There are no officers in national hospitals yet</h2>
        </div>
        @endif

        <div class="col-md-12 mt-3">
            <p class="tab-red">PendingOfficerList</p>
        </div>

        @if (count($officers_pending))
        <table class="table table-striped table-dark ">
            <thead>
              <tr>
                <th scope="col">OfficerName</th>
                <th scope="col">OfficerHospital</th>
                <th scope="col">Promoted</th>
                <th scope="col">Award</th>
                <th scope="col">Pending</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($officers_pending as $officer)
                <tr>
                    <th scope="row">{{ $officer->officer_name }}</th>
                    <td>{{ $officer->hospital_name }}</td>
                    <td>{{ $officer->upgrade }}</td>
                    <td><small>shs</small>{{  $officer->award }}</td>
                    <td>{{ $officer->pending }}</td>
                  </tr>
                @endforeach  
            </tbody>
          </table>
        @else
        <div class="mt-5">
            <h2>There is no pending list of officers yet</h2>
        </div>
        @endif
       
    </div>
</div>
@endsection
