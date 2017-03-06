@extends('fourthmb.course.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success" style="opacity: .8">
                   @if($note != null)

                        <div class="panel-heading">{{$note->title}} &nbsp &nbsp <a href="{{route('fourthmbcoursenotelist', [$courseid])}}">Back</a> </div>
                        <div class="panel-body">
                            <div class="well">
                                {{$note->text}}
                            </div>
                        </div>
                    @elseif($note == null)
                        <div class="panel-heading"><h3>No note details were found</h3></div>
                        <div class="panel-body">

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection