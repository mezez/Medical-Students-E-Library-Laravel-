<?php

namespace App\Http\Controllers;

use App\ThirdMbCourse;
use Illuminate\Http\Request;

class ThirdMbCourseController extends Controller
{
    //
    public function index(){

        $courses = ThirdMbCourse::all();
        return view('thirdmb/course/thirdmbcourselist')->with('courses',$courses);


    }

    public function uindex(){

        $courses = ThirdMbCourse::all();
        return view('thirdmb/course/uthirdmbcourselist')->with('courses',$courses);


    }

    public function courseNoteList($courseid){

        $allnotes = ThirdMbCourse::find($courseid)->thirdmbnotes;
        return view('thirdmb/course/thirdmbcoursenotelist')->with('notes',$allnotes)->with('courseid', $courseid);
    }

    public function ucourseNoteList($courseid){

        $allnotes = ThirdMbCourse::find($courseid)->thirdmbnotes;
        return view('thirdmb/course/uthirdmbcoursenotelist')->with('notes',$allnotes)->with('courseid', $courseid);
    }


    public function courseQuestionList($courseid){

        $allquestions = ThirdMbCourse::find($courseid)->thirdmbpastquestions;
        return view('thirdmb/course/thirdmbcoursequestionlist')->with('questions',$allquestions)->with('courseid', $courseid);
    }

    public function ucourseQuestionList($courseid){

        $allquestions = ThirdMbCourse::find($courseid)->thirdmbpastquestions;
        return view('thirdmb/course/uthirdmbcoursequestionlist')->with('questions',$allquestions)->with('courseid', $courseid);
    }

    public function add(){
        return view('thirdmb/course/add');
    }
    public function save(Request $request)
    {
        // Validate the request...

        $thirdmbcourse = new ThirdMbCourse();

        $thirdmbcourse->title = $request->title;
        //var_dump($thirdmbcourse->title);

        if($thirdmbcourse->save()){
            $request->session()->flash('status',$thirdmbcourse->title.' successfully added to third mbbs courses!');
            return redirect('thirdmbcourselist')->with('status',  $thirdmbcourse->title.' successfully added to third mbbs courses!');

            //return the admin to third mb courses index with flash message
            //remember to validate these later
        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('thirdmbcourselist')->with('status', 'Error saving'.$request->title.'. Try again later');
        }
    }

    public function edit($id){

        $course =  ThirdMbCourse::find($id);
        return view('thirdmb/course/edit')->with('course',$course);

    }

    public function update($id, Request $request){
        $update = ThirdMbCourse::find($id);

        $update->title = $request->title;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect('thirdmbcourselist')->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect('thirdmbcourselist')->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id, Request $request){

        $del = ThirdMbCourse::find($id);

        if( $del->delete()){
            $request->session()->flash('status',$del->title.'has been deleted!');
            return redirect('thirdmbcourselist')->with('status',  $del->title.' has been deleted!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $del->title.'. Try again later');
            return redirect('thirdmbcourselist')->with('status',  'Error Occured updating '. $del->title.'. Try again later');
        }

    }
}
