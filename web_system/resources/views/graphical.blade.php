@extends('layouts.app');


@section('content')
<style>
    :root {
    --level-1: #8dccad;
    --level-2: #f5cc7f;
    --level-3: #7b9fe0;
    --level-4: #f27c8d;
    --black: black;
  }
  
  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }
  
  ol {
    list-style: none;
  }
  
    .black{
        position:-webkit-sticky;
        top: 200px;
        padding: 0;
       margin: 0;
       box-sizing: border-box;
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
    .tab-hospitals{
        text-align: center;
        background:rgba(0, 0, 0, 0.479);
        color:#fff;
        border-radius: 999px;
        width: 100%;
        padding: 8px;
        font-weight: 800;
    }
    .contained {
    max-width: 1000px;
    padding: 0 10px;
    margin: 0 auto;
  }
  
  .rectangle {
    position: relative;
    padding: 20px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
  }
  
  
  
  /* LEVEL-3 STYLES
  –––––––––––––––––––––––––––––––––––––––––––––––––– */
  .level-3-wrapper {
    position: relative;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-column-gap: 20px;
    width: 90%;
    margin: 0 auto;
  }
  
  .level-3-wrapper::before {
    content: "";
    position: absolute;
    top: -20px;
    left: calc(25% - 5px);
    width: calc(50% + 10px);
    height: 2px;
    background: var(--black);
  }
  
  .level-3-wrapper > li::before {
    content: "";
    position: absolute;
    top: 0;
    left: 50%;
    transform: translate(-50%, -100%);
    width: 2px;
    height: 20px;
    background: var(--black);
  }
  
  .level-3 {
    margin-bottom: 20px;
    background: var(--level-3);
  }
  
  
  /* LEVEL-4 STYLES
  –––––––––––––––––––––––––––––––––––––––––––––––––– */
  .level-4-wrapper {
    position: relative;
    width: 80%;
    margin-left: auto;
  }
  
  .level-4-wrapper::before {
    content: "";
    position: absolute;
    top: -20px;
    left: -20px;
    width: 2px;
    height: calc(100% + 20px);
    background: var(--black);
  }
  
  .level-4-wrapper li + li {
    margin-top: 20px;
  }
  
  .level-4 {
    font-weight: normal;
    background: var(--level-4);
  }
  
  .level-4::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 0%;
    transform: translate(-100%, -50%);
    width: 20px;
    height: 2px;
    background: var(--black);
  }
  
  
  /* MQ STYLES
  –––––––––––––––––––––––––––––––––––––––––––––––––– */
  @media screen and (max-width: 700px) {
    .rectangle {
      padding: 20px 10px;
    }
  
    .level-1,
    .level-2 {
      width: 100%;
    }
  
    .level-1 {
      margin-bottom: 20px;
    }
  
    .level-1::before,
    .level-2-wrapper > li::before {
      display: none;
    }
    
    .level-2-wrapper,
    .level-2-wrapper::after,
    .level-2::after {
      display: block;
    }
  
    .level-2-wrapper {
      width: 90%;
      margin-left: 10%;
    }
  
    .level-2-wrapper::before {
      left: -20px;
      width: 2px;
      height: calc(100% + 40px);
    }
  
    .level-2-wrapper > li:not(:first-child) {
      margin-top: 50px;
    }
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
<div class="black"></div>
    <div class="container">
        <div class="col-md-12 mt-3 mb-3">
            <p class="tab">HierachicalDisplays</p>
        </div>
        <div class="contained">
            <div class="col-md-12 mt-3 mb-3">
                <p class="tab-hospitals">GeneralHospitalHierarchy</p>
            </div>
            <ol>
                <h2 class="level-3 rectangle">HeadGeneralHospital</h2>
                <ol class="level-4-wrapper">
                  <li>
                    <h4 class="level-4 rectangle">Officers</h4>
                  </li>
                </ol>
            </ol>
            <div class="col-md-12 mt-3 mb-3">
                <p class="tab-hospitals">ReferalHospitalHierarchy</p>
            </div>
            <ol>
                <h2 class="level-3 rectangle">Superintendent</h2>
                <ol class="level-4-wrapper">
                  <li>
                    <h4 class="level-4 rectangle">SeniorOfficers</h4>
                  </li>
                </ol>
                <div class="col-md-12 mt-3 mb-3">
                    <p class="tab-hospitals">NationalHospitalHierarchy</p>
                </div>
                <ol>
                    <h2 class="level-3 rectangle">DirectorCovid19Pandemic</h2>
                    <ol class="level-4-wrapper">
                      <li>
                        <h4 class="level-4 rectangle">StaffMembers</h4>
                      </li>
                    </ol>

        </div>

        <div class="footer">
            <small>2021 All Rights Reserved</small>
            <a href="{{ route('home') }}">BackHome</a>
        </div>
    </div>
</div>'
    
@endsection