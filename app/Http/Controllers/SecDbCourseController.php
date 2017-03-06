<?php

namespace App\Http\Controllers;

use App\SecDbCourse;
use Illuminate\Http\Request;

class SecDbCourseController extends Controller
{
    //
    public function index(){

        $courses = SecDbCourse::all();
        return view('secdb/course/secdbcourselist')->with('courses',$courses);


    }

    public function uindex(){

        $courses = SecDbCourse::all();
        return view('secdb/course/usecdbcourselist')->with('courses',$courses);


    }

    public function courseNoteList($courseid){

        $allnotes = SecDbCourse::find($courseid)->secdbnotes;
        return view('secdb/course/secdbcoursenotelist')->with('notes',$allnotes)->with('courseid', $courseid);
    }

    public function ucourseNoteList($courseid){

        $allnotes = SecDbCourse::find($courseid)->secdbnotes;
        return view('secdb/course/usecdbcoursenotelist')->with('notes',$allnotes)->with('courseid', $courseid);
    }


    public function courseQuestionList($courseid){

        $allquestions = SecDbCourse::find($courseid)->secdbpastquestions;
        return view('secdb/course/secdbcoursequestionlist')->with('questions',$allquestions)->with('courseid', $courseid);
    }

    public function ucourseQuestionList($courseid){

        $allquestions = SecDbCourse::find($courseid)->secdbpastquestions;
        return view('secdb/course/usecdbcoursequestionlist')->with('questions',$allquestions)->with('courseid', $courseid);
    }

    public function add(){
        return view('secdb/course/add');
    }
    public function save(Request $request)
    {
        // Validate the request...

        $secdbcourse = new SecDbCourse();

        $secdbcourse->title = $request->title;
        //var_dump($secdbcourse->title);

        if($secdbcourse->save()){
            $request->session()->flash('status',$secdbcourse->title.' successfully added to second dbs courses!');
            return redirect('secdbcourselist')->with('status',  $secdbcourse->title.' successfully added to second dbs courses!');

            //return the admin to second db courses index with flash message
            //remedber to validate these later
        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('secdbcourselist')->with('status', 'Error saving'.$request->title.'. Try again later');
        }
    }

    public function edit($id){

        $course =  SecDbCourse::find($id);
        return view('secdb/course/edit')->with('course',$course);

    }

    public function update($id, Request $request){
        $update = SecDbCourse::find($id);

        $update->title = $request->title;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect('secdbcourselist')->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect('secdbcourselist')->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id, Request $request){

        $del = SecDbCourse::find($id);

        if( $del->delete()){
            $request->session()->flash('status',$del->title.'has been deleted!');
            return redirect('secdbcourselist')->with('status',  $del->title.' has been deleted!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $del->title.'. Try again later');
            return redirect('secdbcourselist')->with('status',  'Error Occured updating '. $del->title.'. Try again later');
        }

    }
}
