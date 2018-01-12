@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success" style="opacity: .8">
                    <div class="panel-heading">Fifth BDS Contents</div>

                    <div class="panel-body">
                        <br>
                        In this section, you will find all the notes, past questions and videos avaible for this course
                        in fifth bds
                        <br>


                            <a href="{{route('fifthdbcoursenotelist', [$courseid])}}"> <div class="col-lg-4 well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                    <h3>Fifth BDS Notes</h3>
                                    Click to see more...
                                </div></a>
                            <a href="{{route('fifthdbcoursequestionlist', [$courseid])}}"><div class="col-lg-4  well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                    <h3>Fifth BDS Past Questions</h3>
                                    Click to see more...
                                </div></a>
                            <a href="{{url('/viewvideo')}}"><div class="col-lg-4  well" style="padding:4%; border-bottom: 1px solid #0091B2">
                                <h3>Fifth BDS Videos</h3>
                                Click to see more...
                            </div></a>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
