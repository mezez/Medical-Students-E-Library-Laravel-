<?php

namespace App\Http\Controllers;

use App\ThirdMbPastQuestion;
use Illuminate\Http\Request;

class ThirdMbPastQuestionController extends Controller
{
    //
    public function add($courseid){

        return view('thirdmb/pastquestion/add')->with('id', $courseid);
    }

    public function save($courseid, Request $request)
    {
        // Validate the request...

        $coursequestion = new ThirdMbPastQuestion();

        $coursequestion->title = $request->title;
        $coursequestion->text = $request->text;
        $coursequestion->third_mb_course_id = $courseid;
        //var_dump($thirdmbcourse->title);

        if( $coursequestion->save()){
            $request->session()->flash('status',  $coursequestion->title.' successfully added to third mbbs course past questions!');
            return redirect('thirdmbcoursequestionlist/'.$courseid)->with('status',   $coursequestion->title.' successfully added to third mbbs course pastquestions!');

        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('thirdmbcoursequestionlist/'.$courseid)->with('status', 'Error saving'.$request->title.'. Try again later');
        }

    }

    public function viewquestion($questionid,$courseid){

        $question = ThirdMbPastQuestion::find($questionid);
        return view('thirdmb/pastquestion/notedetail')->with('question', $question)->with('courseid', $courseid);


    }

    public function uviewquestion($questionid,$courseid){

        $question = ThirdMbPastQuestion::find($questionid);
        return view('thirdmb/pastquestion/unotedetail')->with('question', $question)->with('courseid', $courseid);


    }

    public function edit($id, $courseid){

        $question =  ThirdMbPastQuestion::find($id);
        return view('thirdmb/pastquestion/edit')->with('question',$question)->with('courseid', $courseid);

    }

    public function update($id, $courseid, Request $request){
        $update = ThirdMbPastQuestion::find($id);

        $update->title = $request->title;
        $update->text = $request->text;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect()->route('thirdmbcoursequestionlist',[$courseid])->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect()->route('thirdmbcoursequestionlist',[$courseid])->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id,$courseid, Request $request){

        $del = ThirdMbPastQuestion::find($id);

        if( $del->delete()){
            $request->session()->flash('status',$del->title.'has been deleted!');
            return redirect()->route('thirdmbcoursequestionlist',[$courseid])->with('status',  $del->title.' has been deleted!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $del->title.'. Try again later');
            return redirect()->route('thirdmbcoursequestionlist',[$courseid])->with('status',  'Error Occured updating '. $del->title.'. Try again later');
        }

    }
}
