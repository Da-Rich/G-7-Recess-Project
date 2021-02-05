<style>
    .make-fixed{
        position:sticky !important;
        top:0 !important;
        z-index: 100 !important;

    }
    .navbar.navbar-expand-lg.navbar-absolute.navbar-transparent.fixed-top {
    background-color: purple !important;
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
                <a class="navbar-brand mb-0 " href="#">{{ $page ?? 'CoCaRS Ug' }}</a>
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
