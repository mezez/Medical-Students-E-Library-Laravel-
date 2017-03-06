<?php

namespace App\Http\Controllers;

use App\ThirdDbCourse;
use Illuminate\Http\Request;

class ThirdDbCourseController extends Controller
{
    //
    public function index(){

        $courses = ThirdDbCourse::all();
        return view('thirddb/course/thirddbcourselist')->with('courses',$courses);


    }

    public function uindex(){

        $courses = ThirdDbCourse::all();
        return view('thirddb/course/uthirddbcourselist')->with('courses',$courses);


    }

    public function courseNoteList($courseid){

        $allnotes = ThirdDbCourse::find($courseid)->thirddbnotes;
        return view('thirddb/course/thirddbcoursenotelist')->with('notes',$allnotes)->with('courseid', $courseid);
    }

    public function ucourseNoteList($courseid){

        $allnotes = ThirdDbCourse::find($courseid)->thirddbnotes;
        return view('thirddb/course/uthirddbcoursenotelist')->with('notes',$allnotes)->with('courseid', $courseid);
    }


    public function courseQuestionList($courseid){

        $allquestions = ThirdDbCourse::find($courseid)->thirddbpastquestions;
        return view('thirddb/course/thirddbcoursequestionlist')->with('questions',$allquestions)->with('courseid', $courseid);
    }

    public function ucourseQuestionList($courseid){

        $allquestions = ThirdDbCourse::find($courseid)->thirddbpastquestions;
        return view('thirddb/course/uthirddbcoursequestionlist')->with('questions',$allquestions)->with('courseid', $courseid);
    }

    public function add(){
        return view('thirddb/course/add');
    }
    public function save(Request $request)
    {
        // Validate the request...

        $thirddbcourse = new ThirdDbCourse();

        $thirddbcourse->title = $request->title;
        //var_dump($thirddbcourse->title);

        if($thirddbcourse->save()){
            $request->session()->flash('status',$thirddbcourse->title.' successfully added to third dbs courses!');
            return redirect('thirddbcourselist')->with('status',  $thirddbcourse->title.' successfully added to third dbs courses!');

            //return the admin to third db courses index with flash message
            //remedber to validate these later
        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('thirddbcourselist')->with('status', 'Error saving'.$request->title.'. Try again later');
        }
    }

    public function edit($id){

        $course =  ThirdDbCourse::find($id);
        return view('thirddb/course/edit')->with('course',$course);

    }

    public function update($id, Request $request){
        $update = ThirdDbCourse::find($id);

        $update->title = $request->title;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect('thirddbcourselist')->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect('thirddbcourselist')->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id, Request $request){

        $del = ThirdDbCourse::find($id);

        if( $del->delete()){
            $request->session()->flash('status',$del->title.'has been deleted!');
            return redirect('thirddbcourselist')->with('status',  $del->title.' has been deleted!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $del->title.'. Try again later');
            return redirect('thirddbcourselist')->with('status',  'Error Occured updating '. $del->title.'. Try again later');
        }

    }
}
