@extends('layouts.app')

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
                    <div class="panel-heading">Fifth DBS Course Past Questions</div>
                    <div class="panel-body">
                        @if($questions != null)
                            @foreach ($questions as $question)
                                <a href="{{route('fifthdbcoursequestiondetail', [$note->id, $courseid])}}"><h4>{{$note->title}} </h4> </a>
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