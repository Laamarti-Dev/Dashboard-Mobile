@include('layouts.header',['title'=>'Ads Accounts']) <!-- Header -->

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
                                        <div class="col-md-4">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="float-right">
                                                        <i class="fas fa-ad font-24 text-secondary"></i>
                                                    </div>
                                                    <span class="badge badge-primary">Total</span>
                                                    <h3 class="font-weight-bold">{{$Statistics['totale']}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="float-right">
                                                        <i class="fas fa-ad font-24 text-secondary"></i>
                                                    </div>
                                                    <span class="badge badge-success">Active</span>
                                                    <h3 class="font-weight-bold">{{$Statistics['active']}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="float-right">
                                                        <i class="fas fa-ad font-24 text-secondary"></i>
                                                    </div>
                                                    <span class="badge badge-danger">Suspend</span>
                                                    <h3 class="font-weight-bold">{{$Statistics['suspend']}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 align-self-center">
                                    <img src="{{asset('images/dash_ads.png')}}" alt="" class="img-fluid" >
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

                            <h4 class="mt-0 header-title">List Ads Acounts</h4>
                            <div class="mb-3">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('adsAccount')}}" class="btn btn-primary">All</a>
                                    <a href="/adsAccount/active" class="btn btn-success">Active</a>
                                    <a href="/adsAccount/suspend" class="btn btn-danger">Suspend</a>
                                </div>
                            </div>

                            <hr>

                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Platforms</th>
                                            <th>ID</th>
                                            <th data-priority="1">Email</th>
                                            <th data-priority="2">Email(r)</th>
                                            <th data-priority="3">Password</th>
                                            <th data-priority="4">Date Creation</th>
                                            <th data-priority="5">Ip</th>
                                            <th data-priority="11">Adress</th>
                                            <th data-priority="6">Country</th>
                                            <th data-priority="7">State</th>
                                            <th data-priority="8">City</th>
                                            <th data-priority="9">Lat</th>
                                            <th data-priority="10">Long</th>
                                            <th data-priority="12">Phone</th>
                                            <th data-priority="13">Pin Code</th>
                                            <th><i class="fas fa-ad"></i></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            @foreach($AccAds as $con)
                                                <th><span class="badge @if($con->status) badge-success @else badge-danger @endif">@if($con->status) Active @else Suspend @endif</span></th>
                                                <th>{{$con->monetization}}</th>
                                                <th>{{$con->id_ads}}</th>
                                                <td>{{$con->email}}</td>
                                                <td>{{$con->email_Recovery}}</td>
                                                <td>{{$con->password}}</td>
                                                <td>{{$con->created_at}}</td>
                                                <td>{{$con->ip}}</td>
                                                <td>{{$con->adress}}</td>
                                                <td>{{$con->country}}</td>
                                                <td>{{$con->state}}</td>
                                                <td>{{$con->city}}</td>
                                                <td>{{$con->latitude}}</td>
                                                <td>{{$con->longitude}}</td>
                                                <td>{{$con->phone}}</td>
                                                <td>{{$con->pinCode}}</td>
                                                <td data-id="{{$con->id}}">
                                                    <div class="btn-group btn-group-sm">
                                                        <button type="button"  class="tabledit-edit-button btn btn-sm btn-info waves-effect waves-light adsAcc-about" data-toggle="modal" data-animation="bounce" data-target=".bs-info-modal-lg" style="float: none; margin: 4px;"><span class="ti-info"></span></button>
                                                        <button type="button" class="tabledit-edit-button btn btn-sm btn-success waves-effect waves-light adsAcc-edit" data-toggle="modal" data-animation="bounce" data-target=".adsAccounts-edit-modal-lg" style="float: none; margin: 4px;"><span class="ti-pencil"></span></button>
                                                        <button type="button" class="tabledit-delete-button btn btn-sm btn-danger waves-effect waves-light adsAcc-delete" data-toggle="modal" data-animation="bounce" data-target=".bs-delete-modal-md" style="float: none; margin: 4px;"><span class="ti-trash"></span></button>
                                                    </div>
                                                </td>
                                        </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <br>
                            {{ $AccAds->links() }}
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



<!--  Start Add Ads Accounts Modal -->
<div id="modalbb" class="modal fade adsAccounts-create-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Create Ads Acounts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <div class="modal-body">
                <form class="form-horizontal form-material mb-0 form_console_add" action="{{route('adsAccount.store')}}" method="post" novalidate >
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
                            <input type="email" class="form-control" id="email_ads_add" value="{{ old('email_ads_add') }}" placeholder="Email"  name="email_ads_add" required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="email_console_add_recovery">Email Recovery</label>
                            <input type="email" class="form-control" id="email_ads_add_recovery"  value="{{ old('email_ads_add_recovery') }}"  name="email_ads_add_recovery" placeholder="Email Recovery"  required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="password_console_add">Password</label>
                            <input type="text" class="form-control" id="password_ads_add"  name="password_ads_add"  value="{{ old('password_ads_add') }}"  placeholder="Password" required="" >
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="country_console_add">Country</label>
                            <input type="text" class="form-control" name="country_ads_add" id="country_ads_add"  value="{{ old('country_ads_add') }}"  placeholder="Country"  required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state_console_add">State</label>
                            <input type="text" class="form-control" id="state_ads_add"  name="state_ads_add" value="{{ old('state_ads_add') }}"  placeholder="State"  required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="city_console_add">City</label>
                            <input type="text" class="form-control" id="city_ads_add" name="city_ads_add"  value="{{ old('city_ads_add') }}"  placeholder="City" required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="ip_console_add">Ip Adresse</label>
                            <input type="text" class="form-control" pattern="^([0-9]{1,3}\.){3}[0-9]{1,3}$" id="ip_ads_add"  name="ip_ads_add" placeholder="Ip"  value="{{ old('ip_ads_add') }}" required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="latitude_console_add">Latitude</label>
                            <input type="text" class="form-control" pattern="^(\-?\d+(\.\d+)?).\s*(\-?\d+(\.\d+)?)$" name="latitude_ads_add" id="latitude_ads_add" placeholder="Latitude"  value="{{ old('latitude_ads_add') }}"  required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="longitude_console_add">Longitude</label>
                            <input type="text" class="form-control" pattern="^(\-?\d+(\.\d+)?).\s*(\-?\d+(\.\d+)?)$" id="longitude_ads_add" name="longitude_ads_add" placeholder="Longitude" value="{{ old('longitude_ads_add') }}"  required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="method_console_add">Adress</label>
                            <input type="text" class="form-control" id="adress_ads_add"  name="adress_ads_add" placeholder="Adress" value="{{ old('adress_ads_add') }}"   required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="phone_console_add">Phone Number</label>
                            <input type="text" class="form-control" id="phone_ads_add" name="phone_ads_add" placeholder="Phone Number" value="{{ old('phone_ads_add') }}"  required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="card_console_add">Code Pin</label>
                            <div class="radio radio-success radio-circle">
                                <input id="radio-12" type="radio" value="True"  name="codePin_ads_add" checked >
                                <label for="radio-12">
                                    True
                                </label>
                            </div>
                            <div class="radio radio-danger radio-circle">
                                <input id="radio-13" type="radio"  value="False" name="codePin_ads_add" >
                                <label for="radio-13">
                                    False
                                </label>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip13">Monetization Platforms</label>
                            <select class="custom-select" id="validationTooltip13" required="" name="Platforms_ads_add">
                                <option value="">Select Monetization Platforms</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Admob">Admob</option>
                                <option value="Media.net">Media.net:</option>
                                <option value="AppMonet">AppMonet</option>
                                <option value="StartApp">StartApp</option>
                                <option value="Epom Apps">Epom Apps</option>
                                <option value="Millennial Media">Millennial Media</option>
                                <option value="SmartyAds">SmartyAds</option>
                                <option value="InMobi">InMobi</option>
                                <option value="Smaato">Smaato</option>
                                <option value="Chartboost">Chartboost</option>
                                <option value="Unity Ads">Unity Ads</option>
                                <option value="Leadbolt">Leadbolt</option>
                                <option value="Fyber">Fyber</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip15">Ads ID</label>
                            <input type="text" class="form-control" id="validationTooltip15"  name="id_ads_add" placeholder="ID AdS" required="">
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
<!--  End Add Ads Accounts Modal -->



<!--  Start Edit Ads Accounts Modal -->
<div id="modaledit" class="modal fade adsAccounts-edit-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Create Ads Acounts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <div class="modal-body">
                <form class="form-horizontal form-material mb-0 form_ads_edit" action="{{route('adsAccount.update')}}" method="post" novalidate >
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
                        <div class="col-md-4 mb-3">
                            <label for="email_ads_edit">Email</label>
                            <input type="hidden" name="id" id="id">
                            <input type="email" class="form-control" id="email_ads_edit" value="{{ old('email_ads_edit') }}" placeholder="Email"  name="email_ads_edit" required="" readonly>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="email_ads_edit_recovery">Email Recovery</label>
                            <input type="email" class="form-control" id="email_ads_edit_recovery"  value="{{ old('email_ads_edit_recovery') }}"  name="email_ads_edit_recovery" placeholder="Email Recovery"  required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="password_ads_edit">Password</label>
                            <input type="text" class="form-control" id="password_ads_edit"  name="password_ads_edit"  value="{{ old('password_ads_edit') }}"  placeholder="Password" required="" >
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="country_ads_edit">Country</label>
                            <input type="text" class="form-control" name="country_ads_edit" id="country_ads_edit"  value="{{ old('country_ads_edit') }}"  placeholder="Country"  required="" readonly>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state_ads_edit">State</label>
                            <input type="text" class="form-control" id="state_ads_edit"  name="state_ads_edit" value="{{ old('state_ads_edit') }}"  placeholder="State"  required="" readonly>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="city_ads_edit">City</label>
                            <input type="text" class="form-control" id="city_ads_edit" name="city_ads_edit"  value="{{ old('city_ads_edit') }}"  placeholder="City" required="" readonly>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="ip_ads_edit">Ip Adresse</label>
                            <input type="text" class="form-control" pattern="^([0-9]{1,3}\.){3}[0-9]{1,3}$" id="ip_ads_edit"  name="ip_ads_edit" placeholder="Ip"  value="{{ old('ip_ads_edit') }}" required="" readonly>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="latitude_ads_edit">Latitude</label>
                            <input type="text" class="form-control" pattern="^(\-?\d+(\.\d+)?).\s*(\-?\d+(\.\d+)?)$" name="latitude_ads_edit" id="latitude_ads_edit" placeholder="Latitude"  value="{{ old('latitude_ads_edit') }}"  required="" readonly>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="longitude_ads_edit">Longitude</label>
                            <input type="text" class="form-control" pattern="^(\-?\d+(\.\d+)?).\s*(\-?\d+(\.\d+)?)$" id="longitude_ads_edit" name="longitude_ads_edit" placeholder="Longitude" value="{{ old('longitude_ads_edit') }}"  required="" readonly>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="method_ads_edit">Adress</label>
                            <input type="text" class="form-control" id="adress_ads_edit"  name="adress_ads_edit" placeholder="Adress" value="{{ old('adress_ads_edit') }}"   required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="phone_ads_edit">Phone Number</label>
                            <input type="text" class="form-control" id="phone_ads_edit" name="phone_ads_edit" placeholder="Phone Number" value="{{ old('phone_ads_edit') }}"  required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="card_ads_edit">Code Pin</label>
                            <div class="radio radio-success radio-circle">
                                <input id="radio-201" type="radio" value="True"  name="codePin_ads_edit" >
                                <label for="radio-201">
                                    True
                                </label>
                            </div>
                            <div class="radio radio-danger radio-circle">
                                <input id="radio-200" type="radio"  value="False" name="codePin_ads_edit" >
                                <label for="radio-200">
                                    False
                                </label>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="Platforms_ads_edit">Monetization Platforms</label>
                            <select class="custom-select" id="Platforms_ads_edit" required="" name="Platforms_ads_edit" disabled>
                                <option value="">Select Monetization Platforms</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Admob">Admob</option>
                                <option value="Media.net">Media.net:</option>
                                <option value="AppMonet">AppMonet</option>
                                <option value="StartApp">StartApp</option>
                                <option value="Epom Apps">Epom Apps</option>
                                <option value="Millennial Media">Millennial Media</option>
                                <option value="SmartyAds">SmartyAds</option>
                                <option value="InMobi">InMobi</option>
                                <option value="Smaato">Smaato</option>
                                <option value="Chartboost">Chartboost</option>
                                <option value="Unity Ads">Unity Ads</option>
                                <option value="Leadbolt">Leadbolt</option>
                                <option value="Fyber">Fyber</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="id_ads_edit">Ads ID</label>
                            <input type="text" class="form-control" id="id_ads_edit"  name="id_ads_edit" placeholder="ID AdS" required="" readonly>
                        </div>
                    </div>

                    <div class="from-row">
                        <div class="col-md-4">
                            <div class="radio radio-success radio-circle">
                                <input id="radio-30" type="radio" name="status" value="1" data-parsley-multiple="status" >
                                <label for="radio-30">
                                    Active
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-danger radio-circle">
                                <input id="radio-31" type="radio" name="status" value="0"  data-parsley-multiple="status">
                                <label for="radio-31">
                                    Suspend
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light postbutton">Update</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--  End Edit Ads Accounts Modal -->




<!--  Start Delete Ads Accounts Modal -->
<div class="modal fade bs-delete-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Are you sure you want to delete ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{route('adsAccount.destroy')}}" method="post">
                @csrf
                <input type="hidden" name="id" id="id_delete">
                <button type="submit" class="btn btn-danger waves-effect waves-light" style="width: 100%;">Delete</button>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--  End  Delete Ads Accounts Modal  Modal -->



<!--  Start About  Ads Accounts  Modal -->
<div class="modal fade bs-info-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">About Application has Ads</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material mb-0" action="#" novalidate>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">All Application</h4>

                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0 table-centered">
                                        <thead>
                                        <tr>
                                            <th>Status Ads</th>
                                            <th>Icon</th>
                                            <th>Name</th>
                                            <th>Installs</th>
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
<!--  End About Ads Accounts  Modal -->


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
