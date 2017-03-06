<?php

namespace App\Http\Controllers;

use App\SecMbCourse;
use Illuminate\Http\Request;

class SecMbCourseController extends Controller
{
    //

    public function index(){

        $courses = SecMbCourse::all();
        return view('secmb/course/secmbcourselist')->with('courses',$courses);


    }
    public function uindex(){

        $courses = SecMbCourse::all();
        return view('secmb/course/usecmbcourselist')->with('courses',$courses);


    }

    public function courseNoteList($courseid){

        $allnotes = SecMbCourse::find($courseid)->secmbnotes;
        return view('secmb/course/secmbcoursenotelist')->with('notes',$allnotes)->with('courseid', $courseid);
    }

    public function ucourseNoteList($courseid){

        $allnotes = SecMbCourse::find($courseid)->secmbnotes;
        return view('secmb/course/usecmbcoursenotelist')->with('notes',$allnotes)->with('courseid', $courseid);
    }


    public function courseQuestionList($courseid){

        $allquestions = SecMbCourse::find($courseid)->secmbpastquestions;
        return view('secmb/course/secmbcoursequestionlist')->with('questions',$allquestions)->with('courseid', $courseid);
    }

    public function ucourseQuestionList($courseid){

        $allquestions = SecMbCourse::find($courseid)->secmbpastquestions;
        return view('secmb/course/usecmbcoursequestionlist')->with('questions',$allquestions)->with('courseid', $courseid);
    }

    public function add(){
        return view('secmb/course/add');
    }
    public function save(Request $request)
    {
        // Validate the request...

        $secmbcourse = new SecMbCourse();

        $secmbcourse->title = $request->title;
        //var_dump($secmbcourse->title);

        if($secmbcourse->save()){
            $request->session()->flash('status',$secmbcourse->title.' successfully added to second mbbs courses!');
            return redirect('secmbcourselist')->with('status',  $secmbcourse->title.' successfully added to second mbbs courses!');

        //return the admin to second mb courses index with flash message
        //remember to validate these later
        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('secmbcourselist')->with('status', 'Error saving'.$request->title.'. Try again later');
        }
    }

    public function edit($id){

        $course =  SecMbCourse::find($id);
        return view('secmb/course/edit')->with('course',$course);

    }

    public function update($id, Request $request){
        $update = SecMbCourse::find($id);

        $update->title = $request->title;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect('secmbcourselist')->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect('secmbcourselist')->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id, Request $request){

        $del = SecMbCourse::find($id);

        if( $del->delete()){
            $request->session()->flash('status',$del->title.'has been deleted!');
            return redirect('secmbcourselist')->with('status',  $del->title.' has been deleted!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $del->title.'. Try again later');
            return redirect('secmbcourselist')->with('status',  'Error Occured updating '. $del->title.'. Try again later');
        }

    }
}
