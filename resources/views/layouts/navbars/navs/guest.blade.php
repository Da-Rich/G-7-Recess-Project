<style>
    .make-fixed{
        position:sticky !important;
        top:0 !important;
        z-index: 100 !important;

    }
    .navbar.navbar-expand-lg.navbar-absolute.navbar-transparent.fixed-top {
    background-color: rgb(100, 128, 0) !important;
    }

</style>

<div class="make-fixed">

    <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent fixed-top">
        {{-- <h2 class="navbar-brand m-4">CoCaRS Ug</h2> --}}
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <div class="navbar-toggle d-inline">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <h1 style="margin:0; color: white;">
                    {{-- <img src = "https://upload.wikimedia.org/wikipedia/commons/7/7c/Coat_of_arms_of_Uganda.svg" style="height:50px"> --}}
                    CoCaRS Uganda</h1>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        {{-- <a href="{{ route('home') }}" class="nav-link text-primary">
                            <i class="tim-icons icon-minimal-left"></i> {{ __('Back to Dashboard') }}
                        </a> --}}
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('register') }}" class="nav-link">
                            <i class="tim-icons icon-laptop"></i> {{ __('Register') }}
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('login') }}" class="nav-link">
                            <i class="tim-icons icon-single-02"></i> {{ __('Login') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</div>
