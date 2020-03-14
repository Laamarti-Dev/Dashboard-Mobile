<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8" />
    <title>{{ config('app.name') }} -   @if(isset($title)) {{ $title }} @endif </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{URL::asset('/images/favicon.png')}}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{URL::asset('/images/favicon.ico')}}">


    <link href="{{URL::asset('plugins/ticker/jquery.jConveyorTicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('plugins/jvectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet">

    @if(Route::currentRouteName() == 'home' || Route::currentRouteName() == 'profile')

        <!-- DataTables -->
            <link href="{{URL::asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{URL::asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    @endif

    @if(Route::currentRouteName() == 'proxydetection'|| Route::currentRouteName() == 'ads')
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
                <!-- DataTables -->
                <link href="{{URL::asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
                <link href="{{URL::asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    @endif


    @if(Route::currentRouteName() == 'console' || Route::currentRouteName() == 'application' || Route::currentRouteName() == 'niche' || Route::currentRouteName() == 'tools'  || Route::currentRouteName() == 'adsAccount')
        <link href="{{URL::asset('plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
    @endif


    <!-- App css -->
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" />

</head>
