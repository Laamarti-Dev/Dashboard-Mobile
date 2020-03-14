<!-- Check Seesion -->
@if(!isset(Auth::user()->email))
    <script>window.location="/login"</script>
@endif

<!-- Navbar Custom Menu -->
<div class="navbar-custom-menu">

    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu list-unstyled">

                <li class="has-submenu">
                    <a href="{{ route('home') }}">
                        <i class="mdi mdi-monitor"></i>
                        Dashboard
                    </a>
                </li>

                <li class="has-submenu">
                    <a><i class="mdi mdi-apps"></i>Manage Application</a>
                    <ul class="submenu">
                        <li><a href="{{ route('console') }}">Console Developer</a></li>
                        <li><a href="{{ route('application') }}">My Application</a></li>
                        <li><a href="{{ route('niche') }}">My Niche</a></li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a><i class="mdi mdi-buffer"></i>Manage Ads</a>
                    <ul class="submenu">
                        <li><a href="{{ route('adsAccount') }}">Ads Accounts</a></li>
                        <li><a href="{{ route('ads') }}">My Ads</a></li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href="{{route('proxydetection')}}"><i class="mdi mdi-cards-playing-outline"></i>Proxy Detection</a>
                </li>

                <li class="has-submenu">
                    <a href="{{ route('tools') }}"><i class="mdi dripicons-to-do"></i>Tools</a>
                </li>
            </ul>
            <!-- End navigation menu -->
        </div> <!-- end navigation -->
    </div> <!-- end container-fluid -->
</div>
<!-- end left-sidenav-->
