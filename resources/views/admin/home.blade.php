@extends('admin.layout')

@section('content')
    <div class="container" style="opacity: .9;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Admin's Dashboard</div>

                    <div class="panel-body">
                        <h3>Welcome To CMDA Admin Panel.</h3>
                        <br>
                       You can manage the application from this section. Adding of courses, adding of past questions, videos and lecture
                        notes as well as updating and deleting them can be done from this section.
                    </div>


                <div class="panel-heading ">MBBS Courses</div>

                <div class="panel-body">
                    <div class="row" style="padding:4%;">
                        <a href="{{ url('/secmbcourselist') }}"> <div class="col-lg-3 well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                <h3>Second MBBS</h3>
                                Click to see all courses
                            </div></a>
                        <a href="{{ url('/thirdmbcourselist') }}"><div class="col-lg-3 well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                <h3>Third MBBS</h3>
                                Click to see all courses
                            </div></a>
                        <a href="{{ url('/fourthmbcourselist') }}"><div class="col-lg-3 well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                <h3>Fourth MBBS</h3>
                                Click to see all courses
                            </div></a>
                        <a href="{{ url('/fifthmbcourselist') }}"><div class="col-lg-3 well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                <h3>Fifth MBBS</h3>
                                Click to see all courses
                            </div></a>

                    </div>

                </div>

                    <div class="panel-heading">DBS Courses</div>

                    <div class="panel-body">
                        <div class="row" style="padding:4%;">
                            <a href="secdbcourselist"> <div class="col-lg-3 well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                    <h3>Second DBS</h3>
                                    Click to see all courses
                                </div></a>
                            <a href="thirddbcourselist"><div class="col-lg-3 well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                    <h3>Third &nbsp&nbsp DBS</h3>
                                    Click to see all courses
                                </div></a>
                            <a href="fourthdbcourselist"><div class="col-lg-3 well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                    <h3>Fourth DBS</h3>
                                    Click to see all courses
                                </div></a>
                            <a href="fifthdbcourselist"><div class="col-lg-3 well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                    <h3>Fifth &nbsp&nbsp DBS</h3>
                                    Click to see all courses
                                </div></a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection