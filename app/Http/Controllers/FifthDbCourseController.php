<?php

namespace App\Http\Controllers;

use App\FifthDbCourse;
use Illuminate\Http\Request;

class FifthDbCourseController extends Controller
{
    //
    public function index(){

        $courses = FifthDbCourse::all();
        return view('fifthdb/course/fifthdbcourselist')->with('courses',$courses);


    }

    public function uindex(){

        $courses = FifthDbCourse::all();
        return view('fifthdb/course/ufifthdbcourselist')->with('courses',$courses);


    }

    public function courseNoteList($courseid){

        $allnotes = FifthDbCourse::find($courseid)->fifthdbnotes;
        return view('fifthdb/course/fifthdbcoursenotelist')->with('notes',$allnotes)->with('courseid', $courseid);
    }

    public function ucourseNoteList($courseid){

        $allnotes = FifthDbCourse::find($courseid)->fifthdbnotes;
        return view('fifthdb/course/ufifthdbcoursenotelist')->with('notes',$allnotes)->with('courseid', $courseid);
    }


    public function courseQuestionList($courseid){

        $allquestions = FifthDbCourse::find($courseid)->fifthdbpastquestions;
        return view('fifthdb/course/fifthdbcoursequestionlist')->with('questions',$allquestions)->with('courseid', $courseid);
    }

    public function ucourseQuestionList($courseid){

        $allquestions = FifthDbCourse::find($courseid)->fifthdbpastquestions;
        return view('fifthdb/course/ufifthdbcoursequestionlist')->with('questions',$allquestions)->with('courseid', $courseid);
    }



    public function add(){
        return view('fifthdb/course/add');
    }
    public function save(Request $request)
    {
        // Validate the request...

        $fifthdbcourse = new FifthDbCourse();

        $fifthdbcourse->title = $request->title;
        //var_dump($fifthdbcourse->title);

        if($fifthdbcourse->save()){
            $request->session()->flash('status',$fifthdbcourse->title.' successfully added to fifth dbs courses!');
            return redirect('fifthdbcourselist')->with('status',  $fifthdbcourse->title.' successfully added to fifth dbs courses!');

            //return the admin to fifth db courses index with flash message
            //remedber to validate these later
        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('fifthdbcourselist')->with('status', 'Error saving'.$request->title.'. Try again later');
        }
    }

    public function edit($id){

        $course =  FifthDbCourse::find($id);
        return view('fifthdb/course/edit')->with('course',$course);

    }

    public function update($id, Request $request){
        $update = FifthDbCourse::find($id);

        $update->title = $request->title;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect('fifthdbcourselist')->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect('fifthdbcourselist')->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id, Request $request){

        $del = FifthDbCourse::find($id);

        if( $del->delete()){
            $request->session()->flash('status',$del->title.'has been deleted!');
            return redirect('fifthdbcourselist')->with('status',  $del->title.' has been deleted!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $del->title.'. Try again later');
            return redirect('fifthdbcourselist')->with('status',  'Error Occured updating '. $del->title.'. Try again later');
        }

    }
}
