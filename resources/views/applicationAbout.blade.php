@include('layouts.header',['title'=>'About Application']) <!-- Header -->

<body>

@include('layouts.topbar')<!-- Top Bar -->
@include('layouts.page-wrapper-img')<!--Start page-wrapper-img-->

<div class="page-wrapper">
    <div class="page-wrapper-inner">
    @include('layouts.navbar')<!-- Start NavBar -->
    </div>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body invoice-head">
                            <div class="row">
                                @foreach($MyApps as $apps)
                                <div class="col-md-4 align-self-center">
                                    <img src="{{asset($apps->icon)}}" alt="user" class="rounded-circle img-thumbnail mb-1" style="height: 66px" >
                                </div>
                                <div class="col-md-8">
                                    <ul class="list-inline mb-0 contact-detail float-right">
                                        <li class="list-inline-item">
                                            <div class="pl-3">
                                                <i class="fab fa-android"></i>
                                                <p class="text-muted mb-0">{{$apps->name}}</p>
                                                <p class="text-muted mb-0"><a href="https://play.google.com/store/apps/details?id={{$apps->packageName}}">{{$apps->packageName}}</a></p>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="pl-3">
                                                <i class="fas fa-calendar-alt"></i>
                                                <p class="text-muted mb-0">Publish : {{$apps->date_P}}</p>
                                                <p class="text-muted mb-0">Update : {{$apps->date_U}}</p>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="pl-3">
                                                <i class="fas fa-info"></i>
                                                <p class="text-muted mb-0">Number Installs : {{$apps->installs}}</p>
                                                <p class="text-muted mb-0">Number Rating : {{$apps->review}}</p>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="pl-3">
                                                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg">Description</button>
                                                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0" id="myLargeModalLabel">Description</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                               {!! $apps->description !!}
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div><!--end card-body-->
                        <div class="card-body">
                            <div class="row">
                                @foreach($ConsoleInfo as $con)
                                <div class="col-lg-4">
                                    <div class="card profile-card">
                                        <div class="card-body bg-primary p-0">
                                            <div class="media p-3  align-items-center">
                                                <img src="{{asset('images/console.png')}}" alt="user" class="rounded-circle thumb-lg">
                                                <div class="media-body ml-3  align-self-center">
                                                    <h5 class="mb-1 text-white">{{$con->email}}</h5>
                                                    <p class="mb-0 font-12 text-light">{{$con->country}}</p>
                                                    @if($con->status == 1)
                                                        <span class="badge  badge-success "> Active </span>
                                                    @else
                                                        <span class="badge  badge-danger "> Suspend </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!--end card-->
                                    </div><!--end col-->
                                </div>
                                @endforeach

                                @foreach($AdsAcc as $ads)
                                <div class="col-lg-4">
                                    <div class="card profile-card">
                                        <div class="card-body bg-warning p-0">
                                            <div class="media p-3  align-items-center">
                                                @if($ads->monetization == 'facebook')
                                                    <img src="{{asset('images/fb.png')}}" alt="user" class="rounded-circle thumb-lg">
                                                @elseif($ads->monetization == 'admob')
                                                    <img src="{{asset('images/admob.png')}}" alt="user" class="rounded-circle thumb-lg">
                                                @else
                                                    <img src="{{asset('images/users/user-3.jpg')}}" alt="user" class="rounded-circle thumb-lg">
                                                @endif

                                                <div class="media-body ml-3  align-self-center">
                                                    <h5 class="mb-1 text-white">{{$ads->email}}</h5>
                                                    <p class="mb-0 font-12 text-light">{{$ads->country}}</p>
                                                    @if($ads->status == 1)
                                                        <span class="badge  badge-success "> Active </span>
                                                    @else
                                                        <span class="badge  badge-danger "> Suspend </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!--end card-->
                                    </div><!--end col-->
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="mt-0 header-title">Ads Application</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                            <tr class="bg-warning text-white">
                                                <th style="color: #293055;">Status</th>
                                                <th style="color: #293055;">Type</th>
                                                <th style="color: #293055;">ID</th>
                                                <th style="color: #293055;">Banner</th>
                                                <th style="color: #293055;">Interstitial</th>
                                                <th style="color: #293055;">Rewarded</th>
                                                <th style="color: #293055;">Native</th>
                                                <th style="color: #293055;">Date (C)</th>
                                                <th style="color: #293055;">Date (U)</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($AppsAds as $as)
                                                    <tr>
                                                        <td>
                                                            @if($as->status == 1)
                                                                <span class="badge  badge-success "> Active </span>
                                                            @else
                                                                <span class="badge  badge-danger "> Suspend </span>
                                                            @endif
                                                        </td>
                                                        <td>{{$as->monetization}}</td>
                                                        <td>{{$as->id_ads}}</td>
                                                        <td>{{$as->banner}}</td>
                                                        <td>{{$as->interstitial}}</td>
                                                        <td>{{$as->rewarded}}</td>
                                                        <td>{{$as->native}}</td>
                                                        <td>{{$as->created_at}}</td>
                                                        <td>{{$as->updated_at}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="mt-0 header-title">Application Console Developer</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                            <tr class="bg-primary text-white">
                                                <th style="color: #fff">Status</th>
                                                <th style="color: #fff">Icon</th>
                                                <th style="color: #fff">Name</th>
                                                <th style="color: #fff">Package Name</th>
                                                <th style="color: #fff">Category</th>
                                                <th style="color: #fff">Type</th>
                                                <th style="color: #fff">Installs</th>
                                                <th style="color: #fff">Rating</th>
                                                <th style="color: #fff">Date(P)</th>
                                                <th style="color: #fff">Date(U)</th>
                                                <th style="color: #fff">Ads Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($ConsoleApps as $conA)
                                                <tr>
                                                    <td>
                                                        @if($conA->status == 1)
                                                            <span class="badge  badge-success "> Active </span>
                                                        @else
                                                            <span class="badge  badge-danger "> Suspend </span>
                                                        @endif
                                                    </td>
                                                    <td><img src="{{asset($conA->icon)}}" alt="" class="rounded-circle thumb-sm mr-1"></td>
                                                    <td>{{$conA->name}}</td>
                                                    <td><a href="https://play.google.com/store/apps/details?id={{$conA->packageName}}">{{$conA->packageName}}</a></td>
                                                    <td>{{$conA->category}}</td>
                                                    <td>{{$conA->type}}</td>
                                                    <td>{{$conA->installs}}</td>
                                                    <td>{{$conA->review}}</td>
                                                    <td>{{$conA->date_P}}</td>
                                                    <td>{{$conA->date_U}}</td>
                                                    <td>{{$conA->ads_status}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-12 col-xl-4 ml-auto align-self-center">
                                    <div class="text-center text-muted"><small>Thank you very much for doing business with us. Thanks !</small></div>
                                </div>
                                <div class="col-lg-12 col-xl-4">
                                    <div class="float-right d-print-none">
                                        <a href="/application" class="btn btn-danger text-light">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->

        </div><!-- container -->

        <footer class="footer text-center text-sm-left">
            &copy; 2020 Frogetor <i class="mdi mdi-heart text-danger"></i> by LM
        </footer>
    </div>

</div>


@include('layouts.footer')

