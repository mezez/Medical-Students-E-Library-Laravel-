<?php

namespace App\Http\Controllers;

use App\FourthMbPastQuestion;
use Illuminate\Http\Request;

class FourthMbPastQuestionController extends Controller
{
    //
    public function add($courseid){

        return view('fourthmb/pastquestion/add')->with('id', $courseid);
    }

    public function save($courseid, Request $request)
    {
        // Validate the request...

        $coursequestion = new FourthMbPastQuestion();

        $coursequestion->title = $request->title;
        $coursequestion->text = $request->text;
        $coursequestion->fourth_mb_course_id = $courseid;
        //var_dump($fourthmbcourse->title);

        if( $coursequestion->save()){
            $request->session()->flash('status',  $coursequestion->title.' successfully added to fourth mbbs course past questions!');
            return redirect('fourthmbcoursequestionlist/'.$courseid)->with('status',   $coursequestion->title.' successfully added to fourth mbbs course pastquestions!');

        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('fourthmbcoursequestionlist/'.$courseid)->with('status', 'Error saving'.$request->title.'. Try again later');
        }

    }

    public function viewquestion($questionid,$courseid){

        $question = FourthMbPastQuestion::find($questionid);
        return view('fourthmb/pastquestion/notedetail')->with('question', $question)->with('courseid', $courseid);


    }

    public function uviewquestion($questionid,$courseid){

        $question = FourthMbPastQuestion::find($questionid);
        return view('fourthmb/pastquestion/unotedetail')->with('question', $question)->with('courseid', $courseid);


    }

    public function edit($id, $courseid){

        $question =  FourthMbPastQuestion::find($id);
        return view('fourthmb/pastquestion/edit')->with('question',$question)->with('courseid', $courseid);

    }

    public function update($id, $courseid, Request $request){
        $update = FourthMbPastQuestion::find($id);

        $update->title = $request->title;
        $update->text = $request->text;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect()->route('fourthmbcoursequestionlist',[$courseid])->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect()->route('fourthmbcoursequestionlist',[$courseid])->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id,$courseid, Request $request){

        $del = FourthMbPastQuestion::find($id);

        if( $del->delete()){
            $request->session()->flash('status',$del->title.'has been deleted!');
            return redirect()->route('fourthmbcoursequestionlist',[$courseid])->with('status',  $del->title.' has been deleted!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $del->title.'. Try again later');
            return redirect()->route('fourthmbcoursequestionlist',[$courseid])->with('status',  'Error Occured updating '. $del->title.'. Try again later');
        }

    }
}
