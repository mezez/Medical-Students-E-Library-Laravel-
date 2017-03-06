<?php

namespace App\Http\Controllers;

use App\ThirdDbNote;
use Illuminate\Http\Request;

class ThirdDbNoteController extends Controller
{
    //
    public function add($courseid){

        return view('thirddb/note/add')->with('id', $courseid);
    }

    public function save($courseid, Request $request)
    {
        // Validate the request...

        $coursenote = new ThirdDbNote();

        $coursenote->title = $request->title;
        $coursenote->text = $request->text;
        $coursenote->third_db_course_id = $courseid;
        //var_dump($thirddbcourse->title);

        if($coursenote->save()){
            $request->session()->flash('status', $coursenote->title.' successfully added to third dbs course notes!');
            return redirect('thirddbcoursenotelist/'.$courseid)->with('status',  $coursenote->title.' successfully added to third dbs course notes!');

        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('thirddbcoursenotelist/'.$courseid)->with('status', 'Error saving'.$request->title.'. Try again later');
        }

    }

    public function viewnote($noteid,$courseid){

        $note = ThirdDbNote::find($noteid);
        return view('thirddb/note/notedetail')->with('note', $note)->with('courseid', $courseid);


    }

    public function uviewnote($noteid,$courseid){

        $note = ThirdDbNote::find($noteid);
        return view('thirddb/note/unotedetail')->with('note', $note)->with('courseid', $courseid);


    }

    public function edit($id, $courseid){

        $note =  ThirdDbNote::find($id);
        return view('thirddb/note/edit')->with('note',$note)->with('courseid', $courseid);

    }

    public function update($id, $courseid, Request $request){
        $update = ThirdDbNote::find($id);

        $update->title = $request->title;
        $update->text = $request->text;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect()->route('thirddbcoursenotelist',[$courseid])->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect()->route('thirddbcoursenotelist',[$courseid])->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id,$courseid, Request $request){

        $del = ThirdDbNote::find($id);

        if( $del->delete()){
            $request->session()->flash('status',$del->title.'has been deleted!');
            return redirect()->route('thirddbcoursenotelist',[$courseid])->with('status',  $del->title.' has been deleted!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $del->title.'. Try again later');
            return redirect()->route('thirddbcoursenotelist',[$courseid])->with('status',  'Error Occured updating '. $del->title.'. Try again later');
        }

    }
}
