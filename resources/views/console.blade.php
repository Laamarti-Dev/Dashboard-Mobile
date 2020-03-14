@include('layouts.header',['title'=>'Console Developer']) <!-- Header -->

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
                                                        <i class="fas fa-user-friends font-24 text-secondary"></i>
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
                                                        <i class="fas fa-user-friends font-24 text-secondary"></i>
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
                                                        <i class="fas fa-user-alt-slash font-20 text-secondary"></i>
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
                                                        <i class="fas fa-user-friends font-20 text-secondary"></i>
                                                    </div>
                                                    <span class="badge badge-dark">Active With Apps</span>
                                                    <h3 class="font-weight-bold">{{$Statistics['active_with_apps']}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="float-right">
                                                        <i class="fas fa-user-friends font-20 text-secondary"></i>
                                                    </div>
                                                    <span class="badge badge-info">Active Without Apps</span>
                                                    <h3 class="font-weight-bold">{{$Statistics['active_without_apps']}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 align-self-center">
                                    <img src="{{asset('images/dash.png')}}" alt="" class="img-fluid" >
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

                            <h4 class="mt-0 header-title">List Acounts</h4>
                            <div class="mb-3">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('console')}}" class="btn btn-primary">All</a>
                                    <a href="/console/active" class="btn btn-success">Active</a>
                                    <a href="/console/suspend" class="btn btn-danger">Suspend</a>
                                    <a href="/console/accounts_with_apps" class="btn btn-dark">Active With Apps</a>
                                    <a href="/console/accounts_without_apps" class="btn btn-info">Active Without Apps</a>

                                </div>
                            </div>

                            <hr>

                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th data-priority="1">Email</th>
                                            <th data-priority="2">Email(r)</th>
                                            <th data-priority="3">Password</th>
                                            <th data-priority="4">Date Creation</th>
                                            <th data-priority="5">Ip</th>
                                            <th data-priority="6">Country</th>
                                            <th data-priority="7">State</th>
                                            <th data-priority="8">City</th>
                                            <th data-priority="9">Lat</th>
                                            <th data-priority="10">Long</th>
                                            <th data-priority="11">OPEN METHOD</th>
                                            <th data-priority="12">Phone</th>
                                            <th data-priority="13">Card Number</th>
                                            <th><i class="fas fa-user-cog"></i></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            @foreach($cons as $con)
                                            <th><span class="badge @if($con->status) badge-success @else badge-danger @endif">@if($con->status) Active @else Suspend @endif</span></th>
                                            <td>{{$con->email}}</td>
                                            <td>{{$con->email_Recovery}}</td>
                                            <td>{{$con->password}}</td>
                                            <td>{{$con->created_at}}</td>
                                            <td>{{$con->ip}}</td>
                                            <td>{{$con->country}}</td>
                                            <td>{{$con->state}}</td>
                                            <td>{{$con->city}}</td>
                                            <td>{{$con->latitude}}</td>
                                            <td>{{$con->longitude}}</td>
                                            <td>{{$con->open_Method}}</td>
                                            <td>{{$con->phone}}</td>
                                            <td>{{$con->card_Number}}</td>
                                            <td data-id="{{$con->id}}">
                                                <div class="btn-group btn-group-sm">
                                                    <button type="button"  class="tabledit-edit-button btn btn-sm btn-info waves-effect waves-light console-about" data-toggle="modal" data-animation="bounce" data-target=".bs-info-modal-lg" style="float: none; margin: 4px;"><span class="ti-info"></span></button>
                                                    <button type="button" class="tabledit-edit-button btn btn-sm btn-success waves-effect waves-light console-edit" data-toggle="modal" data-animation="bounce" data-target=".bs-edit-modal-lg" style="float: none; margin: 4px;"><span class="ti-pencil"></span></button>
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
                            {{ $cons->links() }}
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



<!--  Start Add Console Developer Modal -->
<div id="modalbb" class="modal fade bs-create-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Create Console Developer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <div class="modal-body">
                <form class="form-horizontal form-material mb-0 form_console_add" action="{{route('console.store')}}" method="post" novalidate >
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
                            <label for="email_console_add">Email</label>
                            <input type="email" class="form-control" id="email_console_add" value="{{ old('email_console_add') }}" placeholder="Email"  name="email_console_add" required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="email_console_add_recovery">Email Recovery</label>
                            <input type="email" class="form-control" id="email_console_add_recovery"  value="{{ old('email_console_add_recovery') }}"  name="email_console_add_recovery" placeholder="Email Recovery"  required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="password_console_add">Password</label>
                            <input type="text" class="form-control" id="password_console_add"  name="password_console_add"  value="{{ old('password_console_add') }}"  placeholder="Password" required="" >
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="country_console_add">Country</label>
                            <input type="text" class="form-control" name="country_console_add" id="country_console_add"  value="{{ old('country_console_add') }}"  placeholder="Country"  required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state_console_add">State</label>
                            <input type="text" class="form-control" id="state_console_add"  name="state_console_add" value="{{ old('state_console_add') }}"  placeholder="State"  required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="city_console_add">City</label>
                            <input type="text" class="form-control" id="city_console_add" name="city_console_add"  value="{{ old('city_console_add') }}"  placeholder="City" required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="ip_console_add">Ip Adresse</label>
                            <input type="text" class="form-control" pattern="^([0-9]{1,3}\.){3}[0-9]{1,3}$" id="ip_console_add"  name="ip_console_add" placeholder="Ip"  value="{{ old('ip_console_add') }}" required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="latitude_console_add">Latitude</label>
                            <input type="text" class="form-control" pattern="^(\-?\d+(\.\d+)?).\s*(\-?\d+(\.\d+)?)$" name="latitude_console_add" id="latitude_console_add" placeholder="Latitude"  value="{{ old('latitude_console_add') }}"  required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="longitude_console_add">Longitude</label>
                            <input type="text" class="form-control" pattern="^(\-?\d+(\.\d+)?).\s*(\-?\d+(\.\d+)?)$" id="longitude_console_add" name="longitude_console_add" placeholder="Longitude" value="{{ old('longitude_console_add') }}"  required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="method_console_add">Open Method</label>
                            <input type="text" class="form-control" id="method_console_add"  name="method_console_add" placeholder="Open Method" value="{{ old('method_console_add') }}"   required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="card_console_add">Card Number</label>
                            <input type="text" class="form-control"  pattern="[0-9]{13,16}" name="card_console_add" id="card_console_add" placeholder="Card Number" value="{{ old('card_console_add') }}"   required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="phone_console_add">Phone Number</label>
                            <input type="text" class="form-control" id="phone_console_add" name="phone_console_add" placeholder="Phone Number" value="{{ old('phone_console_add') }}"  required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light postbutton">Create Accounts</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--  End Add Console Developer Modal -->

<!--  Start Edit Console Developer Modal -->
<div  id="modal_edit" class="  modal fade bs-edit-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Edit Console Developer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material mb-0" action="{{route('console.update')}}" method="post" novalidate>

                @csrf

                <!--- Start Error --->
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show alert-lm" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                            </button>
                            @foreach (session('error') as $errors)
                                {!! $errors !!} <br>
                            @endforeach

                        </div>
                    @endif

                <!--- Start Success --->
                    @if (session('edits'))
                        <div class="alert alert-success alert-dismissible fade show alert-lm" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                            </button>
                            {!! session('edits') !!}
                        </div>
                    @endif

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="email_console_edit">Email</label>
                            <input type="hidden" id="id_edit" name="id" value="{{ old('id') }}" >
                            <input type="email" class="form-control" id="email_console_edit" name="email_console_edit" placeholder="Email"  value="{{ old('email_console_edit') }}" required="" readonly>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="email_console_edit_recovery">Email Recovery</label>
                            <input type="email" class="form-control" id="email_console_edit_recovery" name="email_console_edit_recovery" value="{{ old('email_console_edit_recovery') }}" placeholder="Email Recovery"  required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="password_console_edit">Password</label>
                            <input type="text" class="form-control" id="password_console_edit" name="password_console_edit" value="{{ old('password_console_edit') }}" placeholder="Password" required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="country_console_edit">Country</label>
                            <input type="text" class="form-control" name="country_console_edit" id="country_console_edit" value="{{ old('country_console_edit') }}" placeholder="Country"  required="" readonly>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state_console_edit">State</label>
                            <input type="text" class="form-control" id="state_console_edit" name="state_console_edit" value="{{ old('state_console_edit') }}"  placeholder="State"  required="" readonly>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="city_console_edit">City</label>
                            <input type="text" class="form-control" id="city_console_edit" name="city_console_edit" value="{{ old('city_console_edit') }}"  placeholder="City" required="" readonly>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="ip_console_edit">Ip Adresse</label>
                            <input type="text" class="form-control" pattern="^([0-9]{1,3}\.){3}[0-9]{1,3}$" id="ip_console_edit" value="{{ old('ip_console_edit') }}" name="ip_console_edit" placeholder="Ip"  required="" readonly>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="latitude_console_edit">Latitude</label>
                            <input type="text" class="form-control" pattern="^(\-?\d+(\.\d+)?).\s*(\-?\d+(\.\d+)?)$" id="latitude_console_edit" value="{{ old('latitude_console_edit') }}" name="latitude_console_edit" placeholder="Latitude"  required="" readonly>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="longitude_console_edit">Longitude</label>
                            <input type="text" class="form-control" pattern="^(\-?\d+(\.\d+)?).\s*(\-?\d+(\.\d+)?)$" id="longitude_console_edit" value="{{ old('longitude_console_edit') }}" name="longitude_console_edit" placeholder="Longitude" required="" readonly>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="method_console_edit">Open Method</label>
                            <input type="text" class="form-control" id="method_console_edit" name="method_console_edit" placeholder="Open Method" value="{{ old('method_console_edit') }}" required="" readonly>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cardNumber_console_edit">Card Number</label>
                            <input type="text" class="form-control" pattern="[0-9]{13,16}"  id="cardNumber_console_edit"  name="cardNumber_console_edit" value="{{ old('cardNumber_console_edit') }}" placeholder="Card Number"  required="" readonly>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="phone_console_edit">Phone Number</label>
                            <input type="text" class="form-control" id="phone_console_edit" name="phone_console_edit"  value="{{ old('phone_console_edit') }}" placeholder="Phone Number" required="" readonly>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="from-row">
                        <div class="col-md-4">
                            <div class="radio radio-success radio-circle">
                                <input id="radio-20" type="radio" name="status" value="1" @if(old('status') == 1) checked @endif>
                                <label for="radio-20">
                                    Active
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-danger radio-circle">
                                <input id="radio-21" type="radio" name="status" value="0" @if(old('status') == 0) checked @endif>
                                <label for="radio-21">
                                    Suspend
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger waves-effect waves-light">Save Changes</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--  End Edit Console Developer Modal -->


<!--  Start Delete Console Developer Modal -->
<div class="modal fade bs-delete-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Are you sure you want to delete ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{route('console.destroy')}}" method="post">
                @csrf
                <input type="hidden" name="id" id="id_delete">
                <button type="submit" class="btn btn-danger waves-effect waves-light" style="width: 100%;">Delete</button>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--  End Delete Console Developer Modal -->


<!--  Start About  Console Developer Modal -->
<div class="modal fade bs-info-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">About Console Developer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material mb-0" action="#" novalidate>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="email_about">Email</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="email_about" readonly>

                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="emailRecovery_about">Email Recovery</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="emailRecovery_about" value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="password_about">Password</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="password_about" value="" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="country_about">Country</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="country_about" value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state_about">State</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="state_about" value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="city_about">City</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="city_about" value="" readonly>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="ip_about">Ip Adresse</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="ip_about" value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="latitude_about">Latitude</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="latitude_about" value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="longitude_about">Longitude</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="longitude_about" value="" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="method_about">Open Method</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="method_about" value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cardNumber_about">Card Number</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cardNumber_about" value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="phone_about">Phone Number</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="phone_about" value="" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="from-row">
                        <div class="col-md-4">
                            <div class="radio radio-success radio-circle">
                                <input id="radio-12" type="radio"  name="status" disabled>
                                <label for="radio-12">
                                    Active
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-danger radio-circle">
                                <input id="radio-13" type="radio" name="status" disabled>
                                <label for="radio-13">
                                    Suspend
                                </label>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">All Application</h4>

                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0 table-centered">
                                        <thead>
                                        <tr>
                                            <th>Icon</th>
                                            <th>Name</th>
                                            <th>Installs</th>
                                            <th>Date Publish</th>
                                            <th>Status</th>
                                            <th><i class="fas fa-user-cog"></i></th>
                                        </tr>
                                        </thead>
                                        <tbody class="data-application">

                                        </tbody>
                                    </table><!--end /table-->
                                </div><!--end /tableresponsive-->
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div> <!-- end col -->

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal" >Close</button>
            </div>
            </form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--  End About  Console Developer Modal -->


@include('layouts.footer')

@if (session('success') || session('errors'))
    <script>
        $('#modalbb').modal('show');
    </script>
@endif

@if (session('error') || session('edits'))
    <script>
        $('#modal_edit').modal('show');
    </script>
@endif
