
<div class="page-wrapper-img"><!--Start page-wrapper-img-->
    <div class="page-wrapper-img-inner">
        <div class="sidebar-user media">
            <img src="@if(isset(Auth()->user()->img)) {{asset(Auth()->user()->img )}} @endif" alt="user" class="rounded-circle img-thumbnail mb-1">
            <span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
            <div class="media-body">
                <h5 class="text-light">@if(isset(Auth()->user()->fullname)){{Auth()->user()->fullname}} @endif</h5>
                <ul class="list-unstyled list-inline mb-0 mt-2">
                    <li class="list-inline-item">
                        <a href="{{ route('profile') }}" class=""><i class="mdi mdi-account text-light"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ route('logout') }}" class=""><i class="mdi mdi-power text-danger"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right align-item-center mt-2">

                            @if(Route::currentRouteName() == 'console')
                                <button type="button"  id="btn_add" class="btn btn-info px-4 align-self-center report-btn waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-create-modal-lg">Add New Accounts</button>
                            @endif

                            @if(Route::currentRouteName() == 'application')
                                <button type="button"  id="btn_add_app" class="btn btn-info px-4 align-self-center report-btn waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-create-modal-lg">Add New Application</button>
                                    <button class="btn btn-primary getData" type="button">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none"></span>
                                        <i class="fas fa-redo "></i>
                                    </button>
                            @endif

                            @if(Route::currentRouteName() == 'niche')
                                    <button type="button" id="btn_add_niche" class="btn btn-info px-4 align-self-center report-btn waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".niche-create-modal-lg">Add New Niche</button>
                            @endif

                            @if(Route::currentRouteName() == 'adsAccount')
                                    <button type="button" id="btn_add_ads" class="btn btn-info px-4 align-self-center report-btn waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".adsAccounts-create-modal-lg">Add Ads Accounts</button>
                            @endif

                            @if(Route::currentRouteName() == 'ads')
                                    <button type="button" id="btn_add_adsSettings" class="btn btn-info px-4 align-self-center report-btn waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-add-modal-lg">Add New Ads</button>
                            @endif

                    </div>
                    <h4 class="page-title mb-2">
                        @if(Route::currentRouteName() == 'home')
                            <i class="mdi mdi-monitor"></i> Dashboard
                        @endif

                        @if(Route::currentRouteName() == 'profile')
                            <i class="mdi mdi-account"></i> Profile
                        @endif
                        @if(Route::currentRouteName() == 'console')
                                <i class="mdi mdi-apps mr-2"></i> Console Developer
                        @endif
                        @if(Route::currentRouteName() == 'application' || Route::currentRouteName() == 'application.show')
                                <i class="mdi mdi-apps mr-2"></i> My Application
                        @endif

                        @if(Route::currentRouteName() == 'niche')
                                <i class="mdi mdi-apps mr-2"></i> My Niche
                         @endif

                            @if(Route::currentRouteName() == 'tools')
                                <i class="mdi dripicons-to-do"></i> Tools
                            @endif

                         @if(Route::currentRouteName() == 'adsAccount')
                                <i class="mdi mdi-buffer"></i> Ads Accounts
                         @endif

                            @if(Route::currentRouteName() == 'ads')
                                <i class="mdi mdi-buffer"></i> Ads Settings
                         @endif

                            @if(Route::currentRouteName() == 'proxydetection')
                                <i class="mdi mdi-cards-playing-outline"></i> Proxy Detection
                         @endif

                    </h4>
                    <div class="">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Mobile LM</a></li>
                            @if(Route::currentRouteName() == 'home')
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            @endif

                            @if(Route::currentRouteName() == 'profile')
                                <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
                            @endif
                            @if(Route::currentRouteName() == 'console')
                                <li class="breadcrumb-item"><a href="{{ route('console') }}">Console Developer</a></li>
                            @endif
                            @if(Route::currentRouteName() == 'application' || Route::currentRouteName() == 'application.show' )
                                <li class="breadcrumb-item"><a href="{{ route('application') }}">My Application</a></li>
                            @endif
                            @if(Route::currentRouteName() == 'niche' )
                                <li class="breadcrumb-item"><a href="{{ route('niche') }}">Niche</a></li>
                            @endif

                            @if(Route::currentRouteName() == 'proxydetection' )
                                <li class="breadcrumb-item"><a href="{{ route('proxydetection') }}">Proxy Detection</a></li>
                            @endif

                            @if(Route::currentRouteName() == 'adsAccount' )
                                <li class="breadcrumb-item"><a href="{{ route('adsAccount') }}">Ads Accounts</a></li>
                            @endif

                            @if(Route::currentRouteName() == 'ads' )
                                <li class="breadcrumb-item"><a href="{{ route('ads') }}">Ads Settings</a></li>
                            @endif

                            @if(Route::currentRouteName() == 'tools' )
                                <li class="breadcrumb-item"><a href="{{ route('tools') }}">Tools</a></li>
                            @endif
                        </ol>
                    </div>
                </div><!--end page title box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->
    </div><!--end page-wrapper-img-inner-->
</div><!--end page-wrapper-img-->
