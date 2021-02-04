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
    <div id="chart" style="height: 200px; background: rgba(11, 223, 75, 0.212);"></div>
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
            minBarLength:1,
            barPercentage: 0.8
        }])



      });

    </script>
    @endsection
  {{-- </body> --}}
{{-- </html> --}}
