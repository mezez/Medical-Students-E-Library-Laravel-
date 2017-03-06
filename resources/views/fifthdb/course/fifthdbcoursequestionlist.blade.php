@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    <div class="panel-heading">Fifth DBS Course Past Questions &nbsp;&nbsp;&nbsp; <li><a href="{{route('daddfifthcoursequestion',[$courseid])}}"><h4>Add new past questions to current course</h4</a> </li> </div>
                    <div class="panel-body">
                        @if($questions != null)
                            @foreach ($questions as $question)
                                <a href="{{route('fifthdbcoursequestiondetail', [$note->id, $courseid])}}"><h4>{{$note->title}} </h4> </a>&nbsp&nbsp <a href="{{url('/fifthdbcoursequestionedit', [$note->id, $courseid])}}">Update</a>&nbsp <a href="{{url('/fifthdbcoursequestiondelete', [$note->id, $courseid])}}">Delete</a>
                            @endforeach
                        @elseif($questions = null)
                            <h3>There are no notes under these courses yet.</h3>
                            <br>
                            <a href="#">Add new past question</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection