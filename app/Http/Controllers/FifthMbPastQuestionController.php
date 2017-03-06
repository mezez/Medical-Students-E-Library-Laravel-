<?php

namespace App\Http\Controllers;

use app\FifthMbPastQuestion;
use Illuminate\Http\Request;

class FifthMbPastQuestionController extends Controller
{
    //
    public function add($courseid){

        return view('fifthmb/pastquestion/add')->with('id', $courseid);
    }

    public function save($courseid, Request $request)
    {
        // Validate the request...

        $coursequestion = new FifthMbPastQuestion();

        $coursequestion->title = $request->title;
        $coursequestion->text = $request->text;
        $coursequestion->fifth_mb_course_id = $courseid;
        //var_dump($fifthmbcourse->title);

        if( $coursequestion->save()){
            $request->session()->flash('status',  $coursequestion->title.' successfully added to fifth mbbs course past questions!');
            return redirect('fifthmbcoursequestionlist/'.$courseid)->with('status',   $coursequestion->title.' successfully added to fifth mbbs course pastquestions!');

        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('fifthmbcoursequestionlist/'.$courseid)->with('status', 'Error saving'.$request->title.'. Try again later');
        }

    }

    public function viewquestion($questionid,$courseid){

        $question = FifthMbPastQuestion::find($questionid);
        return view('fifthmb/pastquestion/notedetail')->with('question', $question)->with('courseid', $courseid);


    }

    public function edit($id, $courseid){

        $question =  FifthMbPastQuestion::find($id);
        return view('fifthmb/pastquestion/edit')->with('question',$question)->with('courseid', $courseid);

    }

    public function update($id, $courseid, Request $request){
        $update = FifthMbPastQuestion::find($id);

        $update->title = $request->title;
        $update->text = $request->text;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect()->route('fifthmbcoursequestionlist',[$courseid])->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect()->route('fifthmbcoursequestionlist',[$courseid])->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id,$courseid, Request $request){

        $del = FifthMbPastQuestion::find($id);

        if( $del->delete()){
            $request->session()->flash('status',$del->title.'has been deleted!');
            return redirect()->route('fifthmbcoursequestionlist',[$courseid])->with('status',  $del->title.' has been deleted!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $del->title.'. Try again later');
            return redirect()->route('fifthmbcoursequestionlist',[$courseid])->with('status',  'Error Occured updating '. $del->title.'. Try again later');
        }

    }
}
