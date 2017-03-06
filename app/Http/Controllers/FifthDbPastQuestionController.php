<?php

namespace App\Http\Controllers;

use App\FifthDbPastQuestion;
use Illuminate\Http\Request;

class FifthDbPastQuestionController extends Controller
{
    //
    public function add($courseid){

        return view('fifthdb/pastquestion/add')->with('id', $courseid);
    }

    public function save($courseid, Request $request)
    {
        // Validate the request...

        $coursequestion = new FifthDbPastQuestion();

        $coursequestion->title = $request->title;
        $coursequestion->text = $request->text;
        $coursequestion->fifth_db_course_id = $courseid;
        //var_dump($fifthdbcourse->title);

        if( $coursequestion->save()){
            $request->session()->flash('status',  $coursequestion->title.' successfully added to fifth dbs course past questions!');
            return redirect('fifthdbcoursequestionlist/'.$courseid)->with('status',   $coursequestion->title.' successfully added to fifth dbs course pastquestions!');

        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('fifthdbcoursequestionlist/'.$courseid)->with('status', 'Error saving'.$request->title.'. Try again later');
        }

    }

    public function viewquestion($questionid,$courseid){

        $question = FifthDbPastQuestion::find($questionid);
        return view('fifthdb/pastquestion/questiondetail')->with('question', $question)->with('courseid', $courseid);


    }

    public function uviewquestion($questionid,$courseid){

        $question = FifthDbPastQuestion::find($questionid);
        return view('fifthdb/pastquestion/uquestiondetail')->with('question', $question)->with('courseid', $courseid);


    }

    public function edit($id, $courseid){

        $question =  FifthDbPastQuestion::find($id);
        return view('fifthdb/pastquestion/edit')->with('question',$question)->with('courseid', $courseid);

    }

    public function update($id, $courseid, Request $request){
        $update = FifthDbPastQuestion::find($id);

        $update->title = $request->title;
        $update->text = $request->text;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect()->route('fifthdbcoursequestionlist',[$courseid])->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect()->route('fifthdbcoursequestionlist',[$courseid])->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id,$courseid, Request $request){

        $del = FifthDbPastQuestion::find($id);

        if( $del->delete()){
            $request->session()->flash('status',$del->title.'has been deleted!');
            return redirect()->route('fifthdbcoursequestionlist',[$courseid])->with('status',  $del->title.' has been deleted!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $del->title.'. Try again later');
            return redirect()->route('fifthdbcoursequestionlist',[$courseid])->with('status',  'Error Occured updating '. $del->title.'. Try again later');
        }

    }
}
