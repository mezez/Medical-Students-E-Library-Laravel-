<?php

namespace App\Http\Controllers;

use App\FourthMbCourse;
use Illuminate\Http\Request;

class FourthMbCourseController extends Controller
{
    //
    public function index(){

        $courses = FourthMbCourse::all();
        return view('fourthmb/course/fourthmbcourselist')->with('courses',$courses);


    }

    public function uindex(){

        $courses = FourthMbCourse::all();
        return view('fourthmb/course/ufourthmbcourselist')->with('courses',$courses);


    }

    public function courseNoteList($courseid){

        $allnotes = FourthMbCourse::find($courseid)->fourthmbnotes;
        return view('fourthmb/course/fourthmbcoursenotelist')->with('notes',$allnotes)->with('courseid', $courseid);
    }

    public function ucourseNoteList($courseid){

        $allnotes = FourthMbCourse::find($courseid)->fourthmbnotes;
        return view('fourthmb/course/ufourthmbcoursenotelist')->with('notes',$allnotes)->with('courseid', $courseid);
    }


    public function courseQuestionList($courseid){

        $allquestions = FourthMbCourse::find($courseid)->fourthmbpastquestions;
        return view('fourthmb/course/fourthmbcoursequestionlist')->with('questions',$allquestions)->with('courseid', $courseid);
    }

    public function ucourseQuestionList($courseid){

        $allquestions = FourthMbCourse::find($courseid)->fourthmbpastquestions;
        return view('fourthmb/course/ufourthmbcoursequestionlist')->with('questions',$allquestions)->with('courseid', $courseid);
    }

    public function add(){
        return view('fourthmb/course/add');
    }
    public function save(Request $request)
    {
        // Validate the request...

        $fourthmbcourse = new FourthMbCourse();

        $fourthmbcourse->title = $request->title;
        //var_dump($fourthmbcourse->title);

        if($fourthmbcourse->save()){
            $request->session()->flash('status',$fourthmbcourse->title.' successfully added to fourth mbbs courses!');
            return redirect('fourthmbcourselist')->with('status',  $fourthmbcourse->title.' successfully added to fourth mbbs courses!');

            //return the admin to fourth mb courses index with flash message
            //remember to validate these later
        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('fourthmbcourselist')->with('status', 'Error saving'.$request->title.'. Try again later');
        }
    }

    public function edit($id){

        $course =  FourthMbCourse::find($id);
        return view('fourthmb/course/edit')->with('course',$course);

    }

    public function update($id, Request $request){
        $update = FourthMbCourse::find($id);

        $update->title = $request->title;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect('fourthmbcourselist')->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect('fourthmbcourselist')->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id, Request $request){

        $del = FourthMbCourse::find($id);

        if( $del->delete()){
            $request->session()->flash('status',$del->title.'has been deleted!');
            return redirect('fourthmbcourselist')->with('status',  $del->title.' has been deleted!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $del->title.'. Try again later');
            return redirect('fourthmbcourselist')->with('status',  'Error Occured updating '. $del->title.'. Try again later');
        }

    }
}
