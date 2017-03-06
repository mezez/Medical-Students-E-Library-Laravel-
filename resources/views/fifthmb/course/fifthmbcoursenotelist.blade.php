@extends('secmb.course.layout')

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
                    <div class="panel-heading">Fifth MBBS Course Notes &nbsp;&nbsp;&nbsp; <li><a href="{{route('addfifthcoursenote',[$courseid])}}"><h4>Add new note to current course</h4</a> </li> </div>
                    <div class="panel-body">
                        @if($notes != null)
                            @foreach ($notes as $note)<div class="well">
                                <a href="{{route('fifthmbcoursenotedetail', [$note->id, $courseid])}}"><h4>{{$note->title}} </h4> </a>&nbsp&nbsp <a href="{{url('/fifthmbcoursenoteedit', [$note->id, $courseid])}}">Update</a>&nbsp <a href="{{url('/fifthmbcoursenotedelete', [$note->id, $courseid])}}">Delete</a>
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