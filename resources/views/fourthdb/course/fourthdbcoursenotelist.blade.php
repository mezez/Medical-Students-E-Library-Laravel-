@extends('secdb.course.layout')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-success">
                    <div class="panel-heading">Fifth DBS Course Notes &nbsp;&nbsp;&nbsp; <li><a href="{{route('daddfourthcoursenote',[$courseid])}}"><h4>Add new note to current course</h4</a> </li> </div>
                    <div class="panel-body">
                        @if($notes != null)
                            @foreach ($notes as $note)<div class="well">
                                <a href="{{route('fourthdbcoursenotedetail', [$note->id, $courseid])}}"><h4>{{$note->title}} </h4> </a>&nbsp&nbsp <a href="{{url('/fourthdbcoursenoteedit', [$note->id, $courseid])}}">Update</a>&nbsp <a href="{{url('/fourthdbcoursenotedelete', [$note->id, $courseid])}}">Delete</a>
                                </div>
                                @endforeach

                        @elseif($notes == null)
                            <h3>There are no notes under these courses yet.</h3>
                            <br>
                            <a href="#">Add new note</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection