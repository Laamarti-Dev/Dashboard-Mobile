@include('layouts.header',['title'=>'My Application']) <!-- Header -->

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
                            <div class="row">
                                <div class="col-md-9">
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
                                    <img src="{{asset('images/dash_apps.png')}}" alt="" class="img-fluid" >
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">List Application</h4>
                            <div class="mb-3">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('application')}}" class="btn btn-primary">All</a>
                                    <a href="/application/active" class="btn btn-success">Active</a>
                                    <a href="/application/suspend" class="btn btn-danger">Suspend</a>
                                    <a href="/application/application_with_ads" class="btn btn-dark">Apps With Ads</a>
                                    <a href="/application/application_without_ads" class="btn btn-info">Apps Without Ads</a>
                                </div>
                            </div>

                            <hr>

                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Icon</th>
                                            <th data-priority="1">Name</th>
                                            <th data-priority="2">Package Name</th>
                                            <th data-priority="3">Category</th>
                                            <th data-priority="4">Type</th>
                                            <th data-priority="5">Email</th>
                                            <th data-priority="6">Installs</th>
                                            <th data-priority="7">Date(P)</th>
                                            <th data-priority="8">Date(U)</th>
                                            <th data-priority="9">Developer Name</th>
                                            <th data-priority="10">Review</th>
                                            <th>Ads</th>
                                            <th><i class="fab fa-android"></i></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($apps as $app)
                                        <tr>
                                                <th><span class="badge @if($app->status) badge-success @else badge-danger @endif">@if($app->status) Active @else Suspend @endif</span></th>
                                                <td><img src="{{asset($app->icon)}}" alt="" class="rounded-circle thumb-sm mr-1"></td>
                                                <td>{{$app->name}}</td>
                                                <td>{{$app->packageName}}</td>
                                                <td>{{$app->category}}</td>
                                                <td>{{$app->type}}</td>
                                                <td>{{$app->email}}</td>
                                                <td>{{$app->installs}}</td>
                                                <td>{{$app->date_P}}</td>
                                                <td>{{$app->date_U}}</td>
                                                <td>{{$app->developer_Name}}</td>
                                                <td>{{$app->review}}</td>
                                                <td>
                                                    <span class="badge @if($app->ads_status) badge-success @else badge-danger @endif">@if($app->ads_status) ON @else OFF @endif</span>
                                                </td>
                                                <td data-id="{{$app->id}}" >
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="/application/about/id/{{$app->id}}/console/{{$app->id_console}}" type="button"  class="tabledit-edit-button btn btn-sm btn-info waves-effect waves-light application-about"  style="float: none; margin: 4px;"><span class="ti-info"></span></a>
                                                        <button type="button" class="tabledit-delete-button btn btn-sm btn-danger waves-effect waves-light console-delete" data-toggle="modal" data-animation="bounce" data-target=".bs-delete-modal-md" style="float: none; margin: 4px;"><span class="ti-trash"></span></button>
                                                    </div>
                                                </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <br>
                            {{ $apps->links() }}
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div><!-- container -->

        <footer class="footer text-center text-sm-left">
            &copy; 2020 Frogetor <i class="mdi mdi-heart text-danger"></i> by LM
        </footer>
        <!-- end page content -->
    </div>
</div>

<!--  Start Delete Application Modal -->
<div class="modal fade bs-delete-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Are you sure you want to delete ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{route('application.destroy')}}" method="post">
                @csrf
                <input type="hidden" name="id" id="id_delete">
                <button type="submit" class="btn btn-danger waves-effect waves-light" style="width: 100%;">Delete</button>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--  End Delete Application Modal -->

<!--  Start About Application Modal -->
<div class="modal fade bs-info-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">About Application</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material mb-0" action="#" novalidate>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Console Developer</h4>

                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0 table-centered">
                                        <thead>
                                        <tr>
                                            <th>Icon</th>
                                            <th>Name</th>
                                            <th>Date Publish</th>
                                            <th>Status</th>
                                            <th><i class="fab fa-android"></i></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><img src="assets/images/widgets/project1.jpg" alt="" class="rounded-circle thumb-sm mr-1"></td>
                                            <td>25/11/2018</td>
                                            <td>$321</td>
                                            <td><span class="badge badge-success">Active</span></td>
                                            <td><a href="" class="badge badge-default">Read More</a></td>
                                        </tr>

                                        </tbody>
                                    </table><!--end /table-->
                                </div><!--end /tableresponsive-->
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div> <!-- end col -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--  End About Application Modal -->


<!--  Start Add Application  -->
<div id="modalbb" class="modal fade bs-create-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Add New Application</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material mb-0" action="{{route('application.store')}}" method="post" novalidate>
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
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltip07">Console Developer</label>
                            <select class="custom-select" id="validationTooltip09" name="console_id"  required="">
                                <option value="">Select Console Developer</option>
                                @foreach($console as $con)
                                    <option value="{{$con->id}}">{{$con->email}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip07">Package Name</label>
                            <input type="text" class="form-control" id="validationTooltip07" name="packageName" placeholder="Package Name"  required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip09">Type</label>
                            <select class="custom-select" id="validationTooltip09" name="type"  required="">
                                <option value="">Select Type</option>
                                <option value="Game">Game</option>
                                <option value="Prank">Prank</option>
                                <option value="Apps">Apps</option>
                                <option value="Guide">Guide</option>
                            </select>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="validationTooltip09">:</label>
                            <button type="submit" class="btn btn-success waves-effect waves-light form-control">Add Application</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--  End Add Application -->

@include('layouts.footer')

@if (session('success') || session('errors'))
    <script>
        $('#modalbb').modal('show');
    </script>
@endif
