@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h3>BDS MATERIALS</h3>
                        <br>
                        Find the lecture notes, past questions and videos for 2nd to 5th DBS in this section. Each DBS has lectures notes, past questions and videos categorized by courses under it.
                        Click each BDS to find the courses and contents therein.
                        <br>

                        <div class="row" style="padding:4%;">
                            <a href="{{route('usecdbcourselist')}}"> <div class="col-lg-5 well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                    <h3>Second BDS</h3>
                                    Click to see more...
                                </div></a>
                            <a href="{{route('uthirddbcourselist')}}"><div class="col-lg-5 col-lg-offset-2 well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                    <h3>Third BDS</h3>
                                    Click to see more...
                                </div></a>

                        </div>
                        <div class="row" style="padding:4%;">
                            <a href="{{route('ufourthdbcourselist')}}"><div class="col-lg-5 well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                    <h3>Fourth BDS</h3>
                                    Click to see more...
                                </div></a>
                            <a href="{{route('ufifthdbcourselist')}}"><div class="col-lg-5 col-lg-offset-2 well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                    <h3>Fifth BDS</h3>
                                    Click to see more...
                                </div></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection