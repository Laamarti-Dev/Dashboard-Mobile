@include('layouts.header',['title'=>'Tools']) <!-- Header -->

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
               <div class="col-8 offset-2">
                   <form method="post" action="{{route('tools.update')}}" style="width: 100%">
                       @csrf


                       <textarea id="elm1" name="elm1e" aria-hidden="true">
                           @foreach($Tools as $t)
                               {{$t->tools}}
                           @endforeach
                       </textarea>

                       <br>

                       <button type="submit" class="btn btn-warning px-4  form-control text-white" >Save</button>
                   </form>
               </div>
            </div>
        </div>
    </div>

</div>

@include('layouts.footer')
