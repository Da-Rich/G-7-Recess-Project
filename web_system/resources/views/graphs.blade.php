@extends('layouts.app')

@section('content')
<style>
        .footer{
        margin-top: 4rem;
        padding: 10px;
        text-align: center;
    }
    .tab{
        text-align: center;
        background:#000;
        color:#fff;
        border-radius: 999px;
        width: 100%;
        padding: 8px;
        font-weight: 800;
    }
    .footer>a{
        text-decoration:none;

        cursor: pointer;
        font-weight: bold;
    }
</style>
<div class="layout">
      <!-- Chart's container -->
      <div class="container mt-3">
        <div class="col-md-12 mt-3 mb-3">
          <p class="tab">GraphsDisplay</p>
      </div>
        <div id="wellwishers" style="height: 500px;" class="m-4"></div>
        <div class="col-md-12 mt-3 mb-3">
          <p class="tab">GraphsDisplay</p>
      </div>
        <div id="months" style="height: 500px;" class="m-5"></div>
      </div>

     
        <div class="footer">
            <small>2021 All Rights Reserved</small>
            <a href="{{ route('home') }}">BackHome</a>
        </div>
    </div>
    
</div>
<!-- Charting library -->
<script  src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

 <script>
        
      // your Chart code here ex: new Chart
      const chart = new Chartisan({
     el: '#wellwishers',
     url: "@chart('donations_chart')",
     hooks:new ChartisanHooks()
            .beginAtZero()
            .responsive()
           .colors()
           .title({display:true,
           color:"red",
            text:"A graph of Donations  versus Wellwishers",
            font:{
              style:"bold"
            }
            })
           .legend({position:"bottom"})
           .datasets([{type:"bar", 
           label:"wellwishers",
           borderColor:"orange",
           backgroundColor:"orange",
           hoverBackgroundColor:"blue",
           barPercentage: 0.6,
           minBarLength: 2,
           axis:true,
           }])
           
   });

   const chart2 = new Chartisan({
     el: '#months',
     url: "@chart('months_chart')",
     hooks:new ChartisanHooks()
            .beginAtZero()
            .responsive()
           .colors()
           .title("A graph of Donations  versus months")
           .legend({position:"bottom"})
           .datasets([{type:"bar", 
           label:"months",
           borderColor:"orange",
           backgroundColor:"darkgreen",
           hoverBackgroundColor:"red",
           barPercentage: 0.6,
           minBarLength: 2,
           axis:true
           }])
           
   });

   
    
  
   
 </script>

 <script>
   
 </script>
    
@endsection