{{-- @extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile']) --}}
@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h1 class="card-title">Hospitals <hr></h1>
      </div>
      <div class="card-body">
        <div class="table-responsiv\e">
          <table class="table tablesorter table-stripped" id="">
            <thead class=" text-primary">
              <tr>
                <th>
                  Hospital Name
                </th>
                {{-- <th>
                  Location
                </th> --}}
                <th>
                  category
                </th>
                {{-- <th class="text-center">
                  Coming soon
                </th> --}}
              </tr>
            </thead>
            <tbody>
               @foreach ($hospitals as $hospital )


              <tr>
                <td>
                  {{  $hospital['hospital_name'] }}
                </td>
                {{-- <td>
                  {{ $hospital['district']}}
                </td> --}}
                <td>
                    {{$hospital['hospital_category']}}
                </td>
                {{-- <td class="text-center">
                  {{ 'salary'}}
                </td> --}}
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
