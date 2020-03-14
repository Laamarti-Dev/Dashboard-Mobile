@include('layouts.header',['title'=>'Ads Settings']) <!-- Header -->

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
                        <div class="card-body">

                            <h4 class="mt-0 header-title">List Ads</h4>
                            <div class="mb-3">
                                <div class="btn-group" role="group" aria-label="Basic example" style="    display: block;">
                                    <a href="/ads" class="btn btn-primary">All</a>
                                    <a href="/ads/active" class="btn btn-success">Active</a>
                                    <a href="/ads/suspend" class="btn btn-danger">Suspend</a>
                                </div>
                            </div>

                            <hr>

                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Application</th>
                                            <th>Platforms</th>
                                            <th>Email Ads</th>
                                            <th>Email Console</th>
                                            <th>Country</th>
                                            <th data-priority="1">ID</th>
                                            <th data-priority="2">Banner</th>
                                            <th data-priority="3">Interstitial</th>
                                            <th data-priority="4">Rewarded</th>
                                            <th data-priority="12">Native</th>
                                            <th data-priority="13">JSON URL</th>
                                            <th><i class="fas fa-ad"></i></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($AdsAccounts as $ads)
                                            <tr>
                                                <td>
                                                    @if($ads->status == 1) <span class="badge badge-success">Active</span> @endif
                                                    @if($ads->status == 0) <span class="badge badge-danger">Suspend</span> @endif
                                                </td>
                                                <td>
                                                    <img src="{{asset($ads->icon)}}" alt="" height="30">
                                                    <p class="d-inline-block align-middle mb-0">
                                                        <a href="https://play.google.com/store/apps/details?id={{$ads->packageName}}" class="d-inline-block align-middle mb-0 product-name">{{$ads->name}}</a>
                                                    </p>
                                                </td>
                                                <td>{{$ads->monetization}}</td>
                                                <td>{{$ads->email}}</td>
                                                <td>{{$ads->emailC}}</td>
                                                <td>{{$ads->country}}</td>
                                                <td>{{$ads->id_ads}}</td>
                                                <td>{{$ads->banner}}</td>
                                                <td>{{$ads->interstitial}}</td>
                                                <td>{{$ads->rewarded}}</td>
                                                <td>{{$ads->native}}</td>
                                                <td><a href="/get/json/packagename/{{$ads->packageName}}/ads/{{$ads->id}}">Json URL</a> </td>
                                                <td data-id="{{$ads->id}}">
                                                    <div class="btn-group btn-group-sm">
                                                        <button type="button" class="tabledit-edit-button btn btn-sm btn-success waves-effect waves-light edit-ads" data-toggle="modal" data-animation="bounce" data-target=".bs-edit-modal-lg" style="float: none; margin: 4px;"><span class="ti-pencil"></span></button>
                                                        <button type="button" class="tabledit-delete-button btn btn-sm btn-danger waves-effect waves-light delete-ads" data-toggle="modal" data-animation="bounce" data-target=".bs-delete-modal-md" style="float: none; margin: 4px;"><span class="ti-trash"></span></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div><!-- container -->

        <footer class="footer text-center text-sm-left">
            &copy; 2020 Frogetor <i class="mdi mdi-heart text-danger"></i> by LM
        </footer>
    </div>
    <!-- end page content -->
</div>


<!--- Start Add Ads --->
<div  id="modalbb" class="modal fade bs-add-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Create Ads For Application</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material mb-0" action="{{route('ads.store')}}" method="post" novalidate>

                    @csrf

                    <!--- Start Error --->
                        @if (session('errors'))
                            <div class="alert alert-danger alert-dismissible fade show alert-lm" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                                </button>
                                @foreach (session('errors') as $errors)
                                    {!! $errors !!} <br>
                                @endforeach

                            </div>
                        @endif

                    <!--- Start Success --->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show alert-lm" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                                </button>
                                {!! session('success') !!}
                            </div>
                        @endif

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">Select Application</label>
                            <select class="selectpicker form-control id_app" data-live-search="true" name="id_app" data-size="5" required="">
                                <option value="">Select Application</option>
                                @foreach($apps as $app)
                                    <option

                                        @if($app->status == 1)
                                            data-content="<span class='badge badge-success'>{{$app->packageName}}</span>"
                                        @endif

                                        @if($app->status == 0)
                                            data-content="<span class='badge badge-danger'>{{$app->packageName}}</span>"
                                        @endif

                                        value="{{$app->id}}" data-tokens="{{$app->packageName}}">{{$app->packageName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">Select Account Ads</label>
                            <select class="selectpicker form-control id_ads" name="id_ads" data-live-search="true" data-size="5" required="">
                                <option value="">Select Account Ads</option>
                                @foreach($accAds as $accAd)
                                    <option
                                        @if($accAd->status == 1)
                                        data-content="<span class='badge badge-success'>{{$accAd->email}}</span>"
                                        @endif

                                        @if($accAd->status == 0)
                                        data-content="<span class='badge badge-danger'>{{$accAd->email}}</span>"
                                        @endif
                                        data-subtext="{{$accAd->country}}"
                                        value="{{$accAd->id}}" data-tokens="{{$accAd->email}}">{{$accAd->email}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <hr>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip07">Banner ID</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="banner Id" required name="banner">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip08">interstitial ID</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="interstitial Id" required name="interstitial">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip07">Rewarded ID</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Rewarded Id" name="rewarded" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip09">Native advanced ID</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Native advanced Id" required name="native">
                            </div>
                        </div>
                    </div>


                    <div class="from-row">
                        <div class="col-md-4">
                            <div class="radio radio-success radio-circle">
                                <input id="radio-12" type="radio" value="1" checked="" name="status" data-parsley-multiple="status">
                                <label for="radio-12">
                                    Active
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-danger radio-circle">
                                <input id="radio-13" type="radio" value="0" name="status" data-parsley-multiple="status">
                                <label for="radio-13">
                                    Suspend
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Create Ads</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--- End Add Ads --->




<!--- Edit Ads --->
<div  id="modaledit" class="modal fade bs-edit-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Edit Ads For Application</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material mb-0" action="{{route('ads.update')}}" method="post" novalidate>

                @csrf

                <!--- Start Error --->
                    @if (session('errorsedit'))
                        <div class="alert alert-danger alert-dismissible fade show alert-lm" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                            </button>
                            @foreach (session('errorsedit') as $errors)
                                {!! $errors !!} <br>
                            @endforeach

                        </div>
                    @endif

                <!--- Start Success --->
                    @if (session('successedit'))
                        <div class="alert alert-success alert-dismissible fade show alert-lm" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                            </button>
                            {!! session('successedit') !!}
                        </div>
                    @endif

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">Select Application</label>
                            <select class="selectpicker form-control" data-live-search="true" id="id_app" name="id_app" data-size="5" required="">
                                <option value="">Select Application</option>
                                @foreach($apps as $app)
                                    <option

                                        @if($app->status == 1)
                                        data-content="<span class='badge badge-success'>{{$app->packageName}}</span>"
                                        @endif

                                        @if($app->status == 0)
                                        data-content="<span class='badge badge-danger'>{{$app->packageName}}</span>"
                                        @endif

                                        value="{{$app->id}}" data-tokens="{{$app->packageName}}">{{$app->packageName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">Select Account Ads</label>
                            <select class="selectpicker form-control id_ads" id="id_ads" name="id_ads" data-live-search="true" data-size="5" required="">
                                <option value="">Select Account Ads</option>
                                @foreach($accAds as $accAd)
                                    <option
                                        @if($accAd->status == 1)
                                        data-content="<span class='badge badge-success'>{{$accAd->email}}</span>"
                                        @endif

                                        @if($accAd->status == 0)
                                        data-content="<span class='badge badge-danger'>{{$accAd->email}}</span>"
                                        @endif
                                        data-subtext="{{$accAd->country}}"
                                        value="{{$accAd->id}}" data-tokens="{{$accAd->email}}">{{$accAd->email}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <hr>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip07">Banner ID</label>
                            <div class="input-group">
                                <input type="hidden" id="id" name="id">
                                <input type="text" class="form-control" placeholder="banner Id" id="banner" required name="banner">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip08">interstitial ID</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="interstitial Id" id="interstitial" required name="interstitial">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip07">Rewarded ID</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Rewarded Id"  id="rewarded" name="rewarded" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip09">Native advanced ID</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Native advanced Id"  id="native" required name="native">
                            </div>
                        </div>
                    </div>


                    <div class="from-row">
                        <div class="col-md-4">
                            <div class="radio radio-success radio-circle">
                                <input id="radio-21" type="radio" value="1" checked="" name="status" data-parsley-multiple="status">
                                <label for="radio-21">
                                    Active
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-danger radio-circle">
                                <input id="radio-22" type="radio" value="0" name="status" data-parsley-multiple="status">
                                <label for="radio-22">
                                    Suspend
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Update Ads</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--- End Edit Ads --->


<!--  Start Delete Ads Modal -->
<div class="modal fade bs-delete-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Are you sure you want to delete ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{route('ads.destroy')}}" method="post">
                @csrf
                <input type="hidden" name="id" id="id_delete">
                <button type="submit" class="btn btn-danger waves-effect waves-light" style="width: 100%;">Delete</button>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--  End Delete Ads Modal -->



@include('layouts.footer')

@if (session('success') || session('errors'))
    <script>
        $('#modalbb').modal('show');
    </script>
@endif

@if (session('successedit') || session('errorsedit'))
    <script>
        $('#modaledit').modal('show');
    </script>
@endif
