@extends('layouts.header',['title'=>' Dashboard']) <!-- Header -->


<body>

@include('layouts.topbar')<!-- Top Bar -->
@include('layouts.page-wrapper-img')<!--Start page-wrapper-img-->

<div class="page-wrapper">
    <div class="page-wrapper-inner">
        @include('layouts.navbar')<!-- Start NavBar -->
    </div>

    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body border-bottom" style="display: none">
                            <div class="fro_profile">
                                <div class="row">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <div class="fro_profile-main">
                                            <div class="fro_profile-main-pic">
                                                <img src="{{URL::asset('images/users/user-4.jpg')}}" alt="" class="rounded-circle">
                                                <span class="fro-profile_main-pic-change">
                                                            <i class="fas fa-user"></i>
                                                        </span>
                                            </div>
                                            <div class="fro_profile_user-detail">
                                                <h5 class="fro_user-name">Rosa Dodson</h5>
                                                <p class="mb-0 fro_user-name-post">UI/UX Designer</p>
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <div class="header-title">Application Report</div>
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="seling-report">
                                                    <h3 class="seling-data mb-1">81.88%</h3>
                                                    <ul class="list-inline mb-0">
                                                        <li class="mb-2 list-inline-item text-muted font-13"><i class="mdi mdi-label text-success mr-2"></i>Publish</li>
                                                        <li class="mb-2 list-inline-item text-muted font-13"><i class="mdi mdi-label text-danger mr-2"></i>Pending</li>
                                                        <li class="mb-2 list-inline-item text-muted font-13"><i class="mdi mdi-label text-warning mr-2"></i>suspend</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-5 align-item-center">
                                                <canvas id="pro-doughnut" height="180"></canvas>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-4 mb-2 mb-lg-0">
                                        <div class="header-title">Revenue Report</div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="seling-report">
                                                    <h3 class="seling-data mb-1">$2353</h3>
                                                    <p class="text-muted">Today's Revenue</p>
                                                    <h5 class="seling-data-detail">Total Payment Clear</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <span class="peity-bar" data-peity='{ "fill": ["#44a2d2", "#e6edf3"]}' data-width="100%" data-height="100">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8</span>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end f_profile-->
                        </div><!--end card-body-->

                        <div class="card-body">
                            <div class="wrap">
                                <div class="jctkr-label">
                                    <strong>Application Published</strong>
                                </div>
                                <div class="js-conveyor-example">
                                    <ul>
                                        @foreach($apps as $a)
                                        <li>
                                            <a href="play.google.com/store/apps/details?id={{$a->packageName}}">
                                                <img src="{{$a->icon}}" alt="" class="thumb-sm rounded">
                                                <span class="text-primary font-14"><b>{{$a->name}}</b></span>
                                                <span class="text-muted mb-0 font-12 ">{{$a->installs}}</span>
                                            </a>
                                        </li>
                                       @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <h4 class="mt-0">Hello ! {{auth()->user()->fullname}}</h4>
                                    <p class="text-muted">Have a nice day.</p>
                                    <div class="row justify-content-center">
                                        <div class="col-md-2">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="float-right">
                                                        <i class="fab fa-android font-24 text-secondary"></i>
                                                    </div>
                                                    <span class="badge badge-primary">Total</span>
                                                    <h3 class="font-weight-bold">{{$Statistics['totale']}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="float-right">
                                                        <i class="fab fa-android font-24 text-secondary"></i>
                                                    </div>
                                                    <span class="badge badge-success">Active</span>
                                                    <h3 class="font-weight-bold">{{$Statistics['active']}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="float-right">
                                                        <i class="fas fa-ban font-20 text-secondary"></i>
                                                    </div>
                                                    <span class="badge badge-danger">Suspend</span>
                                                    <h3 class="font-weight-bold">{{$Statistics['suspend']}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="float-right">
                                                        <i class="fab fa-android font-20 text-secondary"></i>
                                                    </div>
                                                    <span class="badge badge-dark">Apps With Ads</span>
                                                    <h3 class="font-weight-bold">{{$Statistics['apps_with_ads']}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="float-right">
                                                        <i class="fab fa-android font-20 text-secondary"></i>
                                                    </div>
                                                    <span class="badge badge-warning">Apps Without Ads</span>
                                                    <h3 class="font-weight-bold">{{$Statistics['apps_without_ads']}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 align-self-center">
                                    <img src=" {{URL::asset('images/dash.svg')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div><!--end card-body-->
                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="col-8">
                                    <div class="media">
                                        <img src="{{URL::asset('images/logo-sm.png')}}" height="40" class="mr-4" alt="...">
                                        <div class="media-body align-self-center">
                                            <p class="mb-0 text-muted">{{auth()->user()->AboutUs}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-12">
                    <!--end card-->
                </div> <!--end col-->
            </div><!--end row-->

        </div><!-- container -->

        <footer class="footer text-center text-sm-left">
            &copy; 2020 Frogetor <i class="mdi mdi-heart text-danger"></i> by LM
        </footer>
    </div>
    <!-- end page content -->

</div>
@include('layouts.footer')
