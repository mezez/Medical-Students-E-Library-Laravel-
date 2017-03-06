<?php

namespace App\Http\Controllers;

use App\ThirdDbPastQuestion;
use Illuminate\Http\Request;

class ThirdDbPastQuestionController extends Controller
{
    //
    public function add($courseid){

        return view('thirddb/pastquestion/add')->with('id', $courseid);
    }

    public function save($courseid, Request $request)
    {
        // Validate the request...

        $coursequestion = new ThirdDbPastQuestion();

        $coursequestion->title = $request->title;
        $coursequestion->text = $request->text;
        $coursequestion->third_db_course_id = $courseid;
        //var_dump($thirddbcourse->title);

        if( $coursequestion->save()){
            $request->session()->flash('status',  $coursequestion->title.' successfully added to third dbs course past questions!');
            return redirect('thirddbcoursequestionlist/'.$courseid)->with('status',   $coursequestion->title.' successfully added to third dbs course pastquestions!');

        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('thirddbcoursequestionlist/'.$courseid)->with('status', 'Error saving'.$request->title.'. Try again later');
        }

    }

    public function viewquestion($questionid,$courseid){

        $question = ThirdDbPastQuestion::find($questionid);
        return view('thirddb/pastquestion/questiondetail')->with('question', $question)->with('courseid', $courseid);


    }

    public function uviewquestion($questionid,$courseid){

        $question = ThirdDbPastQuestion::find($questionid);
        return view('thirddb/pastquestion/uquestiondetail')->with('question', $question)->with('courseid', $courseid);


    }

    public function edit($id, $courseid){

        $question =  ThirdDbPastQuestion::find($id);
        return view('thirddb/pastquestion/edit')->with('question',$question)->with('courseid', $courseid);

    }

    public function update($id, $courseid, Request $request){
        $update = ThirdDbPastQuestion::find($id);

        $update->title = $request->title;
        $update->text = $request->text;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect()->route('thirddbcoursequestionlist',[$courseid])->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect()->route('thirddbcoursequestionlist',[$courseid])->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id,$courseid, Request $request){

        $del = ThirdDbPastQuestion::find($id);

        if( $del->delete()){
            $request->session()->flash('status',$del->title.'has been deleted!');
            return redirect()->route('thirddbcoursequestionlist',[$courseid])->with('status',  $del->title.' has been deleted!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $del->title.'. Try again later');
            return redirect()->route('thirddbcoursequestionlist',[$courseid])->with('status',  'Error Occured updating '. $del->title.'. Try again later');
        }

    }
}
