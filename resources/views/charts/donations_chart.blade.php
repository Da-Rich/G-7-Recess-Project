@extends('layouts.app', ['class' => 'login-page', 'contentClass' => 'login-page'])
{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chartisan example</title>
  </head> --}}
  {{-- <body> --}}
    <!-- Chart's container -->
    @section('content')
    <div class="row">
        <div class="col-md-12">
          <div class="card ">
            <div class="card-header">
              <h1 class="card-title"> Donations vs Donors graph  </h1>
            </div>
            <div class="card-body">
              <div class="table">

    <div id="chart" style="height: 400px; background: rgba(231, 240, 233, 0.212);"></div>
    <!-- Charting library -->
    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
    <!-- Your application script -->
    <script>
      const chart = new Chartisan({
        el: '#chart',
        url: "@chart('donations')",
        hooks: new ChartisanHooks()
            .beginAtZero()
            .colors()
            .title("A graph of Donors Vs Amount")
            .responsive()
            .datasets([{type:"bar",
            backgroundColor: "blue",
            hoverBackgroundColor: "white",
            minBarLength:10,
            barPercentage: 1
        }])



      });

    </script>
    </div>
</div>
</div>
</div>
    @endsection
  {{-- </body> --}}
{{-- </html> --}}
