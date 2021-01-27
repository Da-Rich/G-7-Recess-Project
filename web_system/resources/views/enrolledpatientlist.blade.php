@extends('layouts.app');


@section('content')
<style>
    .black{
        background: #bdc3c7;
    }
    .patients{
        text-align: center;
        font-weight: 800;
        padding: 10px;
        margin: 10px;
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
    .tab-patients{
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
    

</style>
<div class="black">
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="patients">Enrolled Patients</h2>
            @if ($patients_general->count())
                <div class="col-md-12">
                    <p class="tab-patients">TotalPatients  👉  {{ $patients_total }}</p>
                </div>
                <div class="col-md-12">
                    <p class="tab">PatientsByGeneralHospital</p>
                </div>
                <table class="table table-striped table-dark ">
                    <thead>
                      <tr>
                        <th scope="col">PatientID</th>
                        <th scope="col">PatientName</th>
                        <th scope="col">Gender</th>
                        <th scope="col">DOI</th>
                        <th scope="col">Status</th>
                        <th scope="col">OFficerName</th>
                        <th scope="col">HospitalName</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients_general as $patient)
                        <tr>
                            <th scope="row">{{ $patient->patient_id }}</th>
                            <td>{{ $patient->patient_name }}</td>
                            <td>{{ $patient->gender }}</td>
                            <td>{{\Carbon\Carbon::parse($patient->created_at)->diffForHumans()}}</td>
                            <td>{{ $patient->category }}</td>
                            <td>{{ $patient->officer_name }}</td>
                            <td>{{ $patient->hospital_name }}</td>
                          </tr>
                        @endforeach  
                    </tbody>
                  </table>
                  {{ $patients_general->links() }}

            @else
            <div class="mt-5">
                <h2>There are no patients yet in general hospital</h2>
            </div>

            @endif
            <div class="col-md-12 m-5 ">
                <p class="tab">PatientsByReferalHospital</p>
            </div>
              @if ($patients_referals->Count())
              <table class="table table-striped table-dark ">
                <thead>
                  <tr>
                    <th scope="col">PatientID</th>
                    <th scope="col">PatientName</th>
                    <th scope="col">Gender</th>
                    <th scope="col">DOI</th>
                    <th scope="col">Status</th>
                    <th scope="col">OFficerName</th>
                    <th scope="col">HospitalName</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($patients_referals as $patient)
                    <tr>
                        <th scope="row">{{ $patient->patient_id }}</th>
                        <td>{{ $patient->patient_name }}</td>
                        <td>{{ $patient->gender }}</td>
                        <td>{{\Carbon\Carbon::parse($patient->created_at)->diffForHumans()}}</td>
                        <td>{{ $patient->category }}</td>
                        <td>{{ $patient->officer_name }}</td>
                        <td>{{ $patient->hospital_name }}</td>
                      </tr>
                    @endforeach  
                </tbody>
              </table>
              {{ $patients_referals->links() }}
                  
              @else
              <div class="mt-5">
                <h2>There are no patients yet in referal hospital</h2>
            </div>
              @endif
              <div class="col-md-12">
                <p class="tab">PatientsByNationalHospital</p>
            </div>
            
                 @if ($patients_nationals->count())
            
                
                    
                    
                    <table class="table table-striped table-dark ">
                        <thead>
                          <tr>
                            <th scope="col">PatientID</th>
                            <th scope="col">PatientName</th>
                            <th scope="col">Gender</th>
                            <th scope="col">DOI</th>
                            <th scope="col">Status</th>
                            <th scope="col">OFficerName</th>
                            <th scope="col">HospitalName</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients_nationals as $patient)
                            <tr>
                                <th scope="row">{{ $patient->patient_id }}</th>
                                <td>{{ $patient->patient_name }}</td>
                                <td>{{ $patient->gender }}</td>
                                <td>{{\Carbon\Carbon::parse($patient->created_at)->diffForHumans()}}</td>
                                <td>{{ $patient->category }}</td>
                                <td>{{ $patient->officer_name }}</td>
                                <td>{{ $patient->hospital_name }}</td>
                              </tr>
                            @endforeach  
                        </tbody>
                      </table>
                      {{ $patients_nationals->links() }}
    
                @else
                <div class="mt-5">
                    <h2>There are no patients yet in national hospital</h2>
                </div>
                @endif 
                <div class="footer">
                    <small>2021 All Rights Reserved</small>
                    <a href="{{ route('home') }}">BackHome</a>
                </div>

        </div>
        

    </div>
    
   
</div>

    
@endsection