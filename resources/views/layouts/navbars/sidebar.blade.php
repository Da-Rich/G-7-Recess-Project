<style>
    .sidebar-wrapper{
        background-color: purple !important;
        left:0;
    }
</style>
<div class="sidebar ">
    <div class="sidebar-wrapper">
        <div class="logo">
            {{-- <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a> --}}
            <a href="#" class="simple-text logo-normal">{{ __() }}</a>
        </div>
        <ul class="nav">
            {{-- <li @if ($pageSlug ?? '' == 'dashboard') class="active " @endif> --}}
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#register" aria-expanded="false">
                    <i class="tim-icons icon-pencil" ></i>
                    <span class="nav-link-text" >{{ __('Register') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="register">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('registerDonation')  }}">
                                <i class="tim-icons icon-coins"></i>
                                <p>{{ __('Donnation') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('registerOfficer')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('Health Officer') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('registerHospital')  }}">
                                <i class="tim-icons icon-bank"></i>
                                <p>{{ __('Hospital') }}</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
{{--  --}}
<li>
    <a data-toggle="collapse" href="#graphs" aria-expanded="false">
        <i class="tim-icons icon-chart-bar-32" ></i>
        <span class="nav-link-text" >{{ __('Graphs') }}</span>
        <b class="caret mt-1"></b>
    </a>

    <div class="collapse show" id="graphs">
        <ul class="nav pl-4">
            <li>
                <a href="{{ route('profile.edit')  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('Donations Graphs') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('registerDonation')  }}">
                    <i class="tim-icons icon-coins"></i>
                    <p>{{ __('Hierarchy') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('registerOfficer')  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('Enrollment Change') }}</p>
                </a>
            </li>

            {{-- <li @if ($pageSlug ?? '' == 'users') class="active " @endif>
                <a href="{{ route('user.index')  }}">
                    <i class="tim-icons icon-coins"></i>
                    <p>{{ __('Hospital') }}</p>
                </a>
            </li> --}}

        </ul>
    </div>
</li>
{{--  --}}

            <li>
                <a href="{{ route('pages.icons') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
             <li>
                <a href="{{ route('charts') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('pages.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('pages.typography') }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            {{-- <li @if ($pageSlug ?? '' == 'rtl') class="active " @endif>
                <a href="{{ route('pages.rtl') }}">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ __('RTL Support') }}</p>
                </a>
            </li> --}}
            {{-- <li class=" {{ $pageSlug ?? '' == 'upgrade' ? 'active' : '' }} bg-info">
                <a href="{{ route('pages.upgrade') }}">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{ __('Upgrade to PRO') }}</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
