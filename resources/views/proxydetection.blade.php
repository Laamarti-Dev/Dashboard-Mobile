@include('layouts.header',['title'=>'Proxy Detection']) <!-- Header -->

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

                            <h4 class="mt-0 header-title">List Proxy Detection</h4>
                            <div class="mb-3">
                                <div class="btn-group" role="group" aria-label="Basic example" style="    display: block;">
                                    <a href="/proxydetection" class="btn btn-primary">All</a>
                                    <a href="/proxydetection/0" class="btn btn-success text-white">Secure IP</a>
                                    <a href="/proxydetection/2" class="btn btn-warning">Non-residential and residential IP</a>
                                    <a href="/proxydetection/1" class="btn btn-danger">Non-residential IP</a>
                                    <a href="/proxydetection/3" class="btn btn-dark">Ip Reverse Engineering</a>
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
                                            <th>Ip</th>
                                            <th>Country</th>
                                            <th>City</th>
                                            <th>Domain</th>
                                            <th>Isp</th>
                                            <th>Date (C)</th>
                                            <th>Date (U)</th>
                                            <th><i class="mdi mdi-cards-playing-outline"></i></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($AccIp as $tools)
                                            <tr>
                                                <td>
                                                    @if($tools->block == 0) <span class="badge badge-success">Secure IP</span> @endif
                                                    @if($tools->block == 2) <span class="badge badge-warning">Non-residential and residential IP</span> @endif
                                                    @if($tools->block == 1) <span class="badge badge-danger">Non-residential IP</span> @endif
                                                    @if($tools->block == 3) <span class="badge badge-dark">Ip Reverse Engineering</span> @endif
                                                </td>

                                                @if(isset($tools->icon))
                                                <td>
                                                    <img src="{{asset($tools->icon)}}" alt="" height="30">
                                                    <p class="d-inline-block align-middle mb-0">
                                                        <a href="https://play.google.com/store/apps/details?id={{$tools->packageName}}" class="d-inline-block align-middle mb-0 product-name">{{$tools->name}}</a>
                                                    </p>
                                                </td>
                                                @endif

                                                @if(!isset($tools->icon))
                                                    <td>
                                                        <p class="d-inline-block align-middle mb-0">
                                                            <a href="https://play.google.com/store/apps/details?id={{$tools->packageName}}" class="d-inline-block align-middle mb-0 product-name">{{$tools->packageName}}</a>
                                                        </p>
                                                    </td>
                                                @endif

                                                <td>{{$tools->ip}}</td>
                                                <td>{{$tools->country_name}}</td>
                                                <td>{{$tools->city}}</td>
                                                <td>{{$tools->domain}}</td>
                                                <td>{{$tools->isp}}</td>
                                                <td>{{$tools->created_at}}</td>
                                                <td>{{$tools->updated_at}}</td>
                                                <td data-id="{{$tools->id}}">
                                                    <div class="btn-group btn-group-sm">
                                                        <button type="button" class="tabledit-delete-button btn btn-sm btn-danger waves-effect waves-light console-delete" data-toggle="modal" data-animation="bounce" data-target=".bs-delete-modal-md" style="float: none; margin: 4px;"><span class="ti-trash"></span></button>
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


<!--  Start Delete Console Developer Modal -->
<div class="modal fade bs-delete-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Are you sure you want to delete ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{route('proxydetection.destroy')}}" method="post">
                @csrf
                <input type="hidden" name="id" id="id_delete">
                <button type="submit" class="btn btn-danger waves-effect waves-light" style="width: 100%;">Delete</button>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--  End Delete Console Developer Modal -->

@include('layouts.footer')
