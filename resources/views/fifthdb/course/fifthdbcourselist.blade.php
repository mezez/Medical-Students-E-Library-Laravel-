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
                    <div class="panel-heading">Fifth DBS Course List</div>
                    <div class="panel-body">
                        @if($courses != null)

                            @foreach ($courses as $course)<div class="well">
                                <a href="{{route('fifthdbcoursecontent', [$course->id])}}"><h4>{{$course->title}} </h4> </a>&nbsp&nbsp <a href="{{route('fifthdbcourseedit', [$course->id])}}">Update</a>&nbsp <a href="{{route('fifthdbcoursedelete', [$course->id])}}">Delete</a>
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