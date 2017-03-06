<?php

namespace App\Http\Controllers;

use App\FourthMbNote;
use Illuminate\Http\Request;

class FourthMbNoteController extends Controller
{
    //
    public function add($courseid){

        return view('fourthmb/note/add')->with('id', $courseid);
    }

    public function save($courseid, Request $request)
    {
        // Validate the request...

        $coursenote = new FourthMbNote();

        $coursenote->title = $request->title;
        $coursenote->text = $request->text;
        $coursenote->fourth_mb_course_id = $courseid;
        //var_dump($fourthmbcourse->title);

        if($coursenote->save()){
            $request->session()->flash('status', $coursenote->title.' successfully added to fourth mbbs course notes!');
            return redirect('fourthmbcoursenotelist/'.$courseid)->with('status',  $coursenote->title.' successfully added to fourth mbbs course notes!');

        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('fourthmbcoursenotelist/'.$courseid)->with('status', 'Error saving'.$request->title.'. Try again later');
        }

    }

    public function viewnote($noteid,$courseid){

        $note = FourthMbNote::find($noteid);
        return view('fourthmb/note/notedetail')->with('note', $note)->with('courseid', $courseid);


    }

    public function uviewnote($noteid,$courseid){

        $note = FourthMbNote::find($noteid);
        return view('fourthmb/note/unotedetail')->with('note', $note)->with('courseid', $courseid);


    }

    public function edit($id, $courseid){

        $note =  FourthMbNote::find($id);
        return view('fourthmb/note/edit')->with('note',$note)->with('courseid', $courseid);

    }

    public function update($id, $courseid, Request $request){
        $update = FourthMbNote::find($id);

        $update->title = $request->title;
        $update->text = $request->text;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect()->route('fourthmbcoursenotelist',[$courseid])->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect()->route('fourthmbcoursenotelist',[$courseid])->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id,$courseid, Request $request){

        $del = FourthMbNote::find($id);

        if( $del->delete()){
            $request->session()->flash('status',$del->title.'has been deleted!');
            return redirect()->route('fourthmbcoursenotelist',[$courseid])->with('status',  $del->title.' has been deleted!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $del->title.'. Try again later');
            return redirect()->route('fourthmbcoursenotelist',[$courseid])->with('status',  'Error Occured updating '. $del->title.'. Try again later');
        }

    }
}
