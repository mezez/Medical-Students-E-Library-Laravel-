<?php

namespace App\Http\Controllers;

use App\FourthDbCourse;
use Illuminate\Http\Request;

class FourthDbCourseController extends Controller
{
    //
    public function index(){

        $courses = FourthDbCourse::all();
        return view('fourthdb/course/fourthdbcourselist')->with('courses',$courses);


    }

    public function uindex(){

        $courses = FourthDbCourse::all();
        return view('fourthdb/course/ufourthdbcourselist')->with('courses',$courses);


    }

    public function courseNoteList($courseid){

        $allnotes = FourthDbCourse::find($courseid)->fourthdbnotes;
        return view('fourthdb/course/fourthdbcoursenotelist')->with('notes',$allnotes)->with('courseid', $courseid);
    }

    public function ucourseNoteList($courseid){

        $allnotes = FourthDbCourse::find($courseid)->fourthdbnotes;
        return view('fourthdb/course/ufourthdbcoursenotelist')->with('notes',$allnotes)->with('courseid', $courseid);
    }


    public function courseQuestionList($courseid){

        $allquestions = FourthDbCourse::find($courseid)->fourthdbpastquestions;
        return view('fourthdb/course/fourthdbcoursequestionlist')->with('questions',$allquestions)->with('courseid', $courseid);
    }

    public function ucourseQuestionList($courseid){

        $allquestions = FourthDbCourse::find($courseid)->fourthdbpastquestions;
        return view('fourthdb/course/ufourthdbcoursequestionlist')->with('questions',$allquestions)->with('courseid', $courseid);
    }

    public function add(){
        return view('fourthdb/course/add');
    }
    public function save(Request $request)
    {
        // Validate the request...

        $fourthdbcourse = new FourthDbCourse();

        $fourthdbcourse->title = $request->title;
        //var_dump($fourthdbcourse->title);

        if($fourthdbcourse->save()){
            $request->session()->flash('status',$fourthdbcourse->title.' successfully added to fourth dbs courses!');
            return redirect('fourthdbcourselist')->with('status',  $fourthdbcourse->title.' successfully added to fourth dbs courses!');

            //return the admin to fourth db courses index with flash message
            //remedber to validate these later
        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('fourthdbcourselist')->with('status', 'Error saving'.$request->title.'. Try again later');
        }
    }

    public function edit($id){

        $course =  FourthDbCourse::find($id);
        return view('fourthdb/course/edit')->with('course',$course);

    }

    public function update($id, Request $request){
        $update = FourthDbCourse::find($id);

        $update->title = $request->title;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect('fourthdbcourselist')->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect('fourthdbcourselist')->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id, Request $request){

        $del = FourthDbCourse::find($id);

        if( $del->delete()){
            $request->session()->flash('status',$del->title.'has been deleted!');
            return redirect('fourthdbcourselist')->with('status',  $del->title.' has been deleted!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $del->title.'. Try again later');
            return redirect('fourthdbcourselist')->with('status',  'Error Occured updating '. $del->title.'. Try again later');
        }

    }
}
