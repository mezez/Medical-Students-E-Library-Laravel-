<?php

namespace App\Http\Controllers;

use App\FifthMbCourse;
use Illuminate\Http\Request;

class FifthMbCourseController extends Controller
{
    //
    public function index(){

        $courses = FifthMbCourse::all();
        return view('fifthmb/course/fifthmbcourselist')->with('courses',$courses);


    }

    public function courseNoteList($courseid){

        $allnotes = FifthMbCourse::find($courseid)->fifthmbnotes;
        return view('fifthmb/course/fifthmbcoursenotelist')->with('notes',$allnotes)->with('courseid', $courseid);
    }


    public function courseQuestionList($courseid){

        $allquestions = FifthMbCourse::find($courseid)->fifthmbpastquestions;
        return view('fifthmb/course/fifthmbcoursequestionlist')->with('questions',$allquestions)->with('courseid', $courseid);
    }

    public function add(){
        return view('fifthmb/course/add');
    }
    public function save(Request $request)
    {
        // Validate the request...

        $fifthmbcourse = new FifthMbCourse();

        $fifthmbcourse->title = $request->title;
        //var_dump($fifthmbcourse->title);

        if($fifthmbcourse->save()){
            $request->session()->flash('status',$fifthmbcourse->title.' successfully added to fifth mbbs courses!');
            return redirect('fifthmbcourselist')->with('status',  $fifthmbcourse->title.' successfully added to fifth mbbs courses!');

            //return the admin to fifth mb courses index with flash message
            //remember to validate these later
        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('fifthmbcourselist')->with('status', 'Error saving'.$request->title.'. Try again later');
        }
    }

    public function edit($id){

        $course =  FifthMbCourse::find($id);
        return view('fifthmb/course/edit')->with('course',$course);

    }

    public function update($id, Request $request){
        $update = FifthMbCourse::find($id);

        $update->title = $request->title;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect('fifthmbcourselist')->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect('fifthmbcourselist')->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id, Request $request){

        $del = FifthMbCourse::find($id);

        if( $del->delete()){
            $request->session()->flash('status',$del->title.'has been deleted!');
            return redirect('fifthmbcourselist')->with('status',  $del->title.' has been deleted!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $del->title.'. Try again later');
            return redirect('fifthmbcourselist')->with('status',  'Error Occured updating '. $del->title.'. Try again later');
        }

    }
}
