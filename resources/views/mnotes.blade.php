@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="opacity: .8">
                    <div class="panel-heading">CMDA Dashboard</div>

                    <div class="panel-body">
                        <h3>MBBS MATERIALS</h3>
                        <br>
                        Find the lecture notes, past questions and videos for 2nd to 5th MBBS in this section. Each MBBS has lectures notes, past questions and videos categorized by courses under it.
                        Click each MBBS to find the courses and contents therein.
                        <br>

                        <div class="row" style="padding:4%;">
                            <a href="{{route('usecmbcourselist')}}"> <div class="col-lg-5 well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                    <h3>Second MBBS</h3>
                                    Click to see more...
                                </div></a>
                            <a href="{{route('uthirdmbcourselist')}}"><div class="col-lg-5 col-lg-offset-2 well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                    <h3>Third MBBS</h3>
                                    Click to see more...
                                </div></a>

                        </div>
                        <div class="row" style="padding:4%;">
                            <a href="{{route('ufourthmbcourselist')}}"><div class="col-lg-5 well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                    <h3>Fourth MBBS</h3>
                                    Click to see more...
                                </div></a>
                            <a href="#"><div class="col-lg-5 col-lg-offset-2 well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                    <h3>Fifth MBBS</h3>
                                    Click to see more...
                                </div></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
