<?php

namespace App\Http\Controllers;

use App\SecDbNote;
use Illuminate\Http\Request;

class SecDbNoteController extends Controller
{
    //
    public function add($courseid){

        return view('secdb/note/add')->with('id', $courseid);
    }

    public function save($courseid, Request $request)
    {
        // Validate the request...

        $coursenote = new SecDbNote();

        $coursenote->title = $request->title;
        $coursenote->text = $request->text;
        $coursenote->sec_db_course_id = $courseid;
        //var_dump($secdbcourse->title);

        if($coursenote->save()){
            $request->session()->flash('status', $coursenote->title.' successfully added to second dbs course notes!');
            return redirect('secdbcoursenotelist/'.$courseid)->with('status',  $coursenote->title.' successfully added to second dbs course notes!');

        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('secdbcoursenotelist/'.$courseid)->with('status', 'Error saving'.$request->title.'. Try again later');
        }

    }

    public function viewnote($noteid,$courseid){

        $note = SecDbNote::find($noteid);
        return view('secdb/note/notedetail')->with('note', $note)->with('courseid', $courseid);


    }

    public function uviewnote($noteid,$courseid){

        $note = SecDbNote::find($noteid);
        return view('secdb/note/unotedetail')->with('note', $note)->with('courseid', $courseid);


    }

    public function edit($id, $courseid){

        $note =  SecDbNote::find($id);
        return view('secdb/note/edit')->with('note',$note)->with('courseid', $courseid);

    }

    public function update($id, $courseid, Request $request){
        $update = SecDbNote::find($id);

        $update->title = $request->title;
        $update->text = $request->text;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect()->route('secdbcoursenotelist',[$courseid])->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect()->route('secdbcoursenotelist',[$courseid])->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id,$courseid, Request $request)
    {

        $del = SecDbNote::find($id);

        if ($del->delete()) {
            $request->session()->flash('status', $del->title . 'has been deleted!');
            return redirect()->route('secdbcoursenotelist', [$courseid])->with('status', $del->title . ' has been deleted!');
        } else {
            $request->session()->flash('status', 'Error Occured updating ' . $del->title . '. Try again later');
            return redirect()->route('secdbcoursenotelist', [$courseid])->with('status', 'Error Occured updating ' . $del->title . '. Try again later');
        }

    }
}
