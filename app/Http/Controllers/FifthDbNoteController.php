<?php

namespace App\Http\Controllers;

use App\FifthDbNote;
use Illuminate\Http\Request;

class FifthDbNoteController extends Controller
{
    //
    public function add($courseid){

        return view('fifthdb/note/add')->with('id', $courseid);
    }

    public function save($courseid, Request $request)
    {
        // Validate the request...

        $coursenote = new FifthDbNote();

        $coursenote->title = $request->title;
        $coursenote->text = $request->text;
        $coursenote->fifth_db_course_id = $courseid;
        //var_dump($fifthdbcourse->title);

        if($coursenote->save()){
            $request->session()->flash('status', $coursenote->title.' successfully added to fifth dbs course notes!');
            return redirect('fifthdbcoursenotelist/'.$courseid)->with('status',  $coursenote->title.' successfully added to fifth dbs course notes!');

        }else{
            $request->session()->flash('status','Error saving'.$request->title.'. Try again later');
            return redirect('fifthdbcoursenotelist/'.$courseid)->with('status', 'Error saving'.$request->title.'. Try again later');
        }

    }

    public function viewnote($noteid,$courseid){

        $note = FifthDbNote::find($noteid);
        return view('fifthdb/note/notedetail')->with('note', $note)->with('courseid', $courseid);


    }

    public function uviewnote($noteid,$courseid){

        $note = FifthDbNote::find($noteid);
        return view('fifthdb/note/unotedetail')->with('note', $note)->with('courseid', $courseid);


    }

    public function edit($id, $courseid){

        $note =  FifthDbNote::find($id);
        return view('fifthdb/note/edit')->with('note',$note)->with('courseid', $courseid);

    }

    public function update($id, $courseid, Request $request){
        $update = FifthDbNote::find($id);

        $update->title = $request->title;
        $update->text = $request->text;

        if($update->save()){
            $request->session()->flash('status',$update->title.' updated successfully!');
            return redirect()->route('fifthdbcoursenotelist',[$courseid])->with('status',  $update->title.' updated successfully!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $request->title.'. Try again later');
            return redirect()->route('fifthdbcoursenotelist',[$courseid])->with('status',  'Error Occured updating '. $request->title.'. Try again later');
        }
    }

    public function delete($id,$courseid, Request $request){

        $del = FifthDbNote::find($id);

        if( $del->delete()){
            $request->session()->flash('status',$del->title.'has been deleted!');
            return redirect()->route('fifthdbcoursenotelist',[$courseid])->with('status',  $del->title.' has been deleted!');
        }
        else{
            $request->session()->flash('status','Error Occured updating '. $del->title.'. Try again later');
            return redirect()->route('fifthdbcoursenotelist',[$courseid])->with('status',  'Error Occured updating '. $del->title.'. Try again later');
        }

    }
}
