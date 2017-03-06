<?php

namespace App\Http\Controllers;

use App\FourthDbPastQuestion;
use Illuminate\Http\Request;

class FourthDbPastQuestionController extends Controller
{
    //
    public function add($courseid){

        return view('fourthdb/pastquestion/add')->with('id', $courseid);
    }

    public function save($courseid, Request $request)
    {
        // Validate the request...

        $coursequestion = new FourthDbPastQuestion();

        $coursequestion->title = $request->title;
        $coursequestion->text = $request->text;
        $coursequestion->fourth_db_course_id = $courseid;
        //var_dump($fourthdbcourse->title);

        if( $coursequestion->save()){
            $request->session()->flash('status',  $coursequestion->title.' successfully added to fourth dbs course past questions!');
            return redirect('fourthdbcoursequestionlist/'.$courseid)->with('status',   $coursequestion->title.' successfully added to fourth dbs course pastquestions!');

        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('fourthdbcoursequestionlist/'.$courseid)->with('status', 'Error saving'.$request->title.'. Try again later');
        }

    }

    public function viewquestion($questionid,$courseid){

        $question = FourthDbPastQuestion::find($questionid);
        return view('fourthdb/pastquestion/questiondetail')->with('question', $question)->with('courseid', $courseid);


    }

    public function uviewquestion($questionid,$courseid){

        $question = FourthDbPastQuestion::find($questionid);
        return view('fourthdb/pastquestion/uquestiondetail')->with('question', $question)->with('courseid', $courseid);


    }

    public function edit($id, $courseid){

        $question =  FourthDbPastQuestion::find($id);
        return view('fourthdb/pastquestion/edit')->with('question',$question)->with('courseid', $courseid);

    }

    public function update($id, $courseid, Request $request){
        $update = FourthDbPastQuestion::find($id);

        $update->title = $request->title;
        $update->text = $request->text;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect()->route('fourthdbcoursequestionlist',[$courseid])->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect()->route('fourthdbcoursequestionlist',[$courseid])->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id,$courseid, Request $request){

        $del = FourthDbPastQuestion::find($id);

        if( $del->delete()){
            $request->session()->flash('status',$del->title.'has been deleted!');
            return redirect()->route('fourthdbcoursequestionlist',[$courseid])->with('status',  $del->title.' has been deleted!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $del->title.'. Try again later');
            return redirect()->route('fourthdbcoursequestionlist',[$courseid])->with('status',  'Error Occured updating '. $del->title.'. Try again later');
        }

    }
}
