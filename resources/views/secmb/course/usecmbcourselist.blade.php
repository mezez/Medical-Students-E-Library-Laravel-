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
                    <div class="panel-heading">Second MBBS Course List</div>
                    <div class="panel-body">
                        @if($courses != null)

                            @foreach ($courses as $course)<div class="well">
                                <a href="{{route('usecmbcoursecontent', [$course->id])}}"><h4>{{$course->title}} </h4> </a>
                                </div>
                            @endforeach
                         @else
                                <h3>There are courses avsilable for now. You can add courses in the admin home page</h3>
                         @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection