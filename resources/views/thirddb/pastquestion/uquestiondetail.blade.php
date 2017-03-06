@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success" style="opacity: .8">
                   @if($question != null)

                        <div class="panel-heading">{{$question->title}} &nbsp &nbsp <a href="{{route('uthirddbcoursequestionlist', [$courseid])}}">Back</a> </div>
                        <div class="panel-body">
                            <div class="well">
                                {{$question->text}}
                            </div>
                        </div>
                    @elseif($question == null)
                        <div class="panel-heading"><h3>No Past Question details were found</h3></div>
                        <div class="panel-body">

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection