<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SecMbNote;

class SecMbNoteController extends Controller
{
    //
    public function add($courseid){

        return view('secmb/note/add')->with('id', $courseid);
    }

    public function save($courseid, Request $request)
    {
        // Validate the request...

        $coursenote = new SecMbNote();

        $coursenote->title = $request->title;
        $coursenote->text = $request->text;
        $coursenote->sec_mb_course_id = $courseid;
        //var_dump($secmbcourse->title);

        if($coursenote->save()){
            $request->session()->flash('status', $coursenote->title.' successfully added to second mbbs course notes!');
            return redirect('secmbcoursenotelist/'.$courseid)->with('status',  $coursenote->title.' successfully added to second mbbs course notes!');

        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('secmbcoursenotelist/'.$courseid)->with('status', 'Error saving'.$request->title.'. Try again later');
        }

    }

    public function viewnote($noteid,$courseid){

        $note = SecMbNote::find($noteid);
        return view('secmb/note/notedetail')->with('note', $note)->with('courseid', $courseid);


    }

    public function uviewnote($noteid,$courseid){

        $note = SecMbNote::find($noteid);
        return view('secmb/note/unotedetail')->with('note', $note)->with('courseid', $courseid);


    }

    public function edit($id, $courseid){

        $note =  SecMbNote::find($id);
        return view('secmb/note/edit')->with('note',$note)->with('courseid', $courseid);

    }

    public function update($id, $courseid, Request $request){
        $update = SecMbNote::find($id);

        $update->title = $request->title;
        $update->text = $request->text;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect()->route('secmbcoursenotelist',[$courseid])->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect()->route('secmbcoursenotelist',[$courseid])->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id,$courseid, Request $request){

        $del = SecMbNote::find($id);

        if( $del->delete()){
            $request->session()->flash('status',$del->title.'has been deleted!');
            return redirect()->route('secmbcoursenotelist',[$courseid])->with('status',  $del->title.' has been deleted!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $del->title.'. Try again later');
            return redirect()->route('secmbcoursenotelist',[$courseid])->with('status',  'Error Occured updating '. $del->title.'. Try again later');
        }

    }
}
