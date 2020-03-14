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
                                <div class="col-lg-6 offset-md-3">
                                    <div class="">
                                        <form class="form-horizontal form-material mb-0" action="{{route('profile.update')}}" method="post" novalidate>
                                            @csrf
                                            <div class="form-group">
                                                <input type="hidden" name="status" value="profile_normal">
                                                <input type="hidden" name="id" value="{{Auth::user()->id}}" >
                                                <input type="text" placeholder="Full Name" name="fullname" class="form-control" data-parsley-minlength="6" value="{{Auth::user()->fullname}}" required="">
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <input type="email" placeholder="Email" name="email" class="form-control" name="example-email" id="example-email" value="{{Auth::user()->email}}"  readonly required>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" placeholder="About Me"  name="aboutMe" class="form-control" data-parsley-minlength="6"  value="{{Auth::user()->aboutMe}}"  required>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" placeholder="Token ID Proxy" class="form-control" name="tokenProxy" data-parsley-minlength="6"  value="{{Auth::user()->IpToken}}"  required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <textarea rows="5" placeholder="About Us" name="aboutUs" class="form-control" data-parsley-minlength="6" required>{{Auth::user()->AboutUs}}</textarea>
                                                <button type="submit" class="btn btn-primary btn-sm text-light px-4 mt-3 float-right mb-0">Update Profile</button>
                                                <button type="button"  class="btn btn-danger btn-sm text-light px-4 mt-3 float-right mb-0 waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center" style="margin-right: 5px;">Change Password</button>
                                            </div>
                                        </form>

                                                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0" id="exampleModalLabel">Change Password</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material mb-0" action="{{route('profile.update')}}" method="post" novalidate>
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="id" value="{{Auth::user()->id}}" >
                                                                        <input type="hidden" name="status" value="profile_password">
                                                                        <input type="password" placeholder="Current Password" name="c_password"  data-parsley-minlength="6" class="form-control" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Equal To</label>
                                                                        <input type="password" id="pass2" class="form-control" required
                                                                               placeholder="Password" data-parsley-minlength="6" name="n_password" />
                                                                        <div class="mt-2">
                                                                            <input type="password" class="form-control" required
                                                                                   data-parsley-equalto="#pass2"
                                                                                   data-parsley-minlength="6"
                                                                                   placeholder="Re-Type Password" name="n_r_password"  />
                                                                        </div>
                                                                    </div><!--end form-group-->

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-danger waves-effect waves-light">Save changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
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
