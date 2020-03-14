@include('layouts.header',['title'=>' Niche']) <!-- Header -->

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
                                        <div class="col-md-3">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="float-right">
                                                        <i class="far fa-dot-circle font-24 text-secondary"></i>
                                                    </div>
                                                    <span class="badge badge-primary">All Niche</span>
                                                    <h3 class="font-weight-bold">{{$Statistics['totale']}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="float-right">
                                                        <i class="far fa-dot-circle font-20 text-secondary"></i>
                                                    </div>
                                                    <span class="badge badge-success">Good Niche</span>
                                                    <h3 class="font-weight-bold">{{$Statistics['good']}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="float-right">
                                                        <i class="far fa-dot-circle font-20 text-secondary"></i>
                                                    </div>
                                                    <span class="badge badge-danger">Bad Niche</span>
                                                    <h3 class="font-weight-bold">{{$Statistics['bad']}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="float-right">
                                                        <i class="far fa-dot-circle font-20 text-secondary"></i>
                                                    </div>
                                                    <span class="badge badge-warning">New Niche</span>
                                                    <h3 class="font-weight-bold">{{$Statistics['new']}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 align-self-center">
                                    <img src="{{asset('images/niche.png')}}" alt="" class="img-fluid" >
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

                            <h4 class="mt-0 header-title">List Niche</h4>
                            <div class="mb-3">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('niche')}}" class="btn btn-primary">All</a>
                                    <a href="/niche/good" class="btn btn-success">Good Niche</a>
                                    <a href="/niche/bad" class="btn btn-danger">Bad Niche</a>
                                    <a href="/niche/new" class="btn btn-warning" >New Niche</a>
                                </div>
                            </div>

                            <hr>

                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th data-priority="1">Name</th>
                                            <th data-priority="2">Date Creation</th>
                                            <th data-priority="3">Date Update</th>
                                            <th><i class="fas fa-dot-circle"></i></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Niche as $n)
                                            <tr>
                                                <th>
                                                    @if($n->status == 'Good Niche')
                                                        <span class="badge badge-success">{{$n->status}}</span>
                                                    @elseif($n->status == 'Bad Niche')
                                                        <span class="badge badge-danger">{{$n->status}}</span>
                                                    @else
                                                        <span class="badge badge-warning">{{$n->status}}</span>
                                                    @endif
                                                </th>
                                                <td>{{$n->name}}</td>
                                                <td>{{$n->created_at}}</td>
                                                <td>{{$n->updated_at}}</td>
                                                <td data-id="{{$n->id}}">
                                                    <div class="btn-group btn-group-sm">
                                                        <button type="button" class="tabledit-edit-button btn btn-sm btn-success waves-effect waves-light niche-edit" data-toggle="modal" data-animation="bounce" data-target=".niche-edit-modal-lg" style="float: none; margin: 4px;"><span class="ti-pencil"></span> | <span class="ti-info"></span></button>
                                                        <button type="button" class="tabledit-delete-button btn btn-sm btn-danger waves-effect waves-light niche-delete" data-toggle="modal" data-animation="bounce" data-target=".bs-delete-modal-md" style="float: none; margin: 4px;"><span class="ti-trash"></span></button>
                                                    </div>
                                                </td>
                                            </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <br>
                            {{ $Niche->links() }}
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


<!--  Start Add Niche -->
<div id="modalbb" class="modal fade niche-create-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Add New Niche</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material mb-0" action="{{route('niche.store')}}"  method="post"novalidate>
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
                        <div class="col-md-8 mb-3">
                            <label for="nicheName">Niche Name</label>
                            <input type="text" class="form-control" id="nicheName" name="nicheName" placeholder="Name"  required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="nicheCategory">:</label>
                            <select id="nicheCategory" class="custom-select" name="nicheCategory" required="">
                                <option value="">Select Category</option>
                                <optgroup label=" Apps">
                                    <option value="art_design">Art &amp; Design</option>
                                    <option value="auto">Auto</option>
                                    <option value="beauty">Beauty</option>
                                    <option value="books_reference">Books &amp; Reference</option>
                                    <option value="business">Business</option>
                                    <option value="comics">Comics</option>
                                    <option value="communication">Communication</option>
                                    <option value="dating">Dating</option>
                                    <option value="education">Education</option>
                                    <option value="entertainment">Entertainment</option>
                                    <option value="Events">Events</option>
                                    <option value="finance">Finance</option>
                                    <option value="food_drink">Food &amp; Drink</option>
                                    <option value="health_fitness">Health &amp; Fitness</option>
                                    <option value="house_home">House &amp; Home</option>
                                    <option value="libraries_demo">Libraries &amp; Demo</option>
                                    <option value="lifestyle">Lifestyle</option>
                                    <option value="transportation">Transportation</option>
                                    <option value="medical">Medical</option>
                                    <option value="music_audio">Music &amp; Audio</option>
                                    <option value="news_magazines">News &amp; Magazines</option>
                                    <option value="parenting">Parenting</option>
                                    <option value="personalization">Personalization</option>
                                    <option value="photography">Photography</option>
                                    <option value="productivity">Productivity</option>
                                    <option value="shopping">Shopping</option>
                                    <option value="social">Social</option>
                                    <option value="sports">Sports</option>
                                    <option value="tools">Tools</option>
                                    <option value="travel_local">Travel &amp; Local</option>
                                    <option value="media_video">Media &amp; Video</option>
                                    <option value="weather">Weather</option>
                                </optgroup>
                                <optgroup label="Games :">
                                    <option value="Action">Action</option>
                                    <option value="adventure">Adventure</option>
                                    <option value="arcade">Arcade</option>
                                    <option value="board">Board</option>
                                    <option value="card">Card</option>
                                    <option value="casino">Casino</option>
                                    <option value="casual">Casual</option>
                                    <option value="educational">Educational</option>
                                    <option value="music">Music</option>
                                    <option value="puzzle">Puzzle</option>
                                    <option value="racing">Racing</option>
                                    <option value="role_playing">Role &amp; Playing</option>
                                    <option value="simulation">Simulation</option>
                                    <option value="sports_games">Sports &amp; Games</option>
                                    <option value="strategy">Strategy</option>
                                    <option value="trivia">Trivia</option>
                                    <option value="word">Word</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <label for="elm1">About Niche</label>
                        <div class="col-md-12 mb-3">
                            <textarea id="elm1" name="elm1"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Add Niche</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--  End Add Niche -->


<!--  Start Edit Niche -->
<div id="modaledit" class="modal fade niche-edit-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel"> Edit Niche</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material mb-0" action="{{route('niche.update')}}"  method="post" novalidate>
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
                        <div class="col-md-8 mb-3">
                            <label for="nicheName">Niche Name</label>
                            <input type="hidden" name="id" id="id">
                            <input type="text" class="form-control" id="nicheNameEdit" name="nicheNameEdit" placeholder="Name"  value="{{old('nicheNameEdit')}}" required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="nicheCategory">:</label>
                            <select id="nicheCategoryEdit" class="custom-select" name="nicheCategoryEdit" required="">
                                <option value="">Select Category</option>
                                <optgroup label=" Apps">
                                    <option value="art_design">Art &amp; Design</option>
                                    <option value="auto">Auto</option>
                                    <option value="beauty">Beauty</option>
                                    <option value="books_reference">Books &amp; Reference</option>
                                    <option value="business">Business</option>
                                    <option value="comics">Comics</option>
                                    <option value="communication">Communication</option>
                                    <option value="dating">Dating</option>
                                    <option value="education">Education</option>
                                    <option value="entertainment">Entertainment</option>
                                    <option value="Events">Events</option>
                                    <option value="finance">Finance</option>
                                    <option value="food_drink">Food &amp; Drink</option>
                                    <option value="health_fitness">Health &amp; Fitness</option>
                                    <option value="house_home">House &amp; Home</option>
                                    <option value="libraries_demo">Libraries &amp; Demo</option>
                                    <option value="lifestyle">Lifestyle</option>
                                    <option value="transportation">Transportation</option>
                                    <option value="medical">Medical</option>
                                    <option value="music_audio">Music &amp; Audio</option>
                                    <option value="news_magazines">News &amp; Magazines</option>
                                    <option value="parenting">Parenting</option>
                                    <option value="personalization">Personalization</option>
                                    <option value="photography">Photography</option>
                                    <option value="productivity">Productivity</option>
                                    <option value="shopping">Shopping</option>
                                    <option value="social">Social</option>
                                    <option value="sports">Sports</option>
                                    <option value="tools">Tools</option>
                                    <option value="travel_local">Travel &amp; Local</option>
                                    <option value="media_video">Media &amp; Video</option>
                                    <option value="weather">Weather</option>
                                </optgroup>
                                <optgroup label="Games :">
                                    <option value="Action">Action</option>
                                    <option value="adventure">Adventure</option>
                                    <option value="arcade">Arcade</option>
                                    <option value="board">Board</option>
                                    <option value="card">Card</option>
                                    <option value="casino">Casino</option>
                                    <option value="casual">Casual</option>
                                    <option value="educational">Educational</option>
                                    <option value="music">Music</option>
                                    <option value="puzzle">Puzzle</option>
                                    <option value="racing">Racing</option>
                                    <option value="role_playing">Role &amp; Playing</option>
                                    <option value="simulation">Simulation</option>
                                    <option value="sports_games">Sports &amp; Games</option>
                                    <option value="strategy">Strategy</option>
                                    <option value="trivia">Trivia</option>
                                    <option value="word">Word</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <label for="elm1">About Niche</label>
                        <div class="col-md-12 mb-3">
                            <textarea id="elm1" class="editIn" name="elm1e">value="{{old('elm1e')}}" </textarea>
                        </div>
                    </div>

                    <div class="from-row">
                        <div class="col-md-4">
                            <div class="radio radio-success radio-circle">
                                <input id="radio-20" type="radio" name="status" value="Good Niche" data-parsley-multiple="status">
                                <label for="radio-20">
                                    Good
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-danger radio-circle">
                                <input id="radio-21" type="radio" name="status" value="Bad Niche"  data-parsley-multiple="status">
                                <label for="radio-21">
                                    Bad
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-warning radio-circle">
                                <input id="radio-22" type="radio" name="status" value="New Niche" data-parsley-multiple="status">
                                <label for="radio-22">
                                    New
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--  End Edit Niche -->


<!--  Start Delete Niche Modal -->
<div class="modal fade bs-delete-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Are you sure you want to delete ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{route('niche.destroy')}}" method="post" style="margin-bottom: 0">
                @csrf
                <input type="hidden" name="id" id="id_delete">
                <button type="submit" class="btn btn-danger waves-effect waves-light" style="width: 100%;">Delete</button>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--  End Delete Niche Modal -->

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
