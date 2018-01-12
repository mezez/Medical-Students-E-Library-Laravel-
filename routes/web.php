<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//add video
Route::get('/addvideo', function(){
    return redirect('https://www.youtube.com/channel/UCKXjJxY4Xpn_Ne2PhhuCt7A');
}
)->name('addvideo');
//view video
Route::get('/viewvideo' , function(){
    return redirect('https://www.youtube.com/channel/UCKXjJxY4Xpn_Ne2PhhuCt7A');})->name('viewvideo');

//routes related to fifth dbs pastquestions controller
Route::get('/fifthdbcoursequestionedit/{id}/{courseid}', 'FifthDbPastQuestionController@edit')->name('fifthdbcoursequestionedit');
Route::get('/fifthdbcoursequestiondelete/{id}/{courseid}', 'FifthDbPastQuestionController@delete')->name('fifthdbcoursequestiondelete');
Route::post('/fifthdbcoursequestionupdate/{id}/{courseid}', 'FifthDbPastQuestionController@update')->name('fifthdbcoursequestionupdate');
Route::get('/fifthdbcoursequestiondetail/{id}/{courseid}', 'FifthDbPastQuestionController@viewquestion')->name('fifthdbcoursequestiondetail');
Route::get('/ufifthdbcoursequestiondetail/{id}/{courseid}', 'FifthDbPastQuestionController@uviewquestion')->name('ufifthdbcoursequestiondetail');
Route::post('/add_fifthdbcoursequestion/{id}', 'FifthDbPastQuestionController@save')->name('daddfifthcoursequestion');
Route::get('/add_fifthdbcoursequestion/{id}', 'FifthDbPastQuestionController@add')->name('dsavefifthcoursequestion');

//routes related to  fifth dbs notes controller
Route::get('/fifthdbcoursenoteedit/{id}/{courseid}', 'FifthDbNoteController@edit')->name('fifthdbcoursenoteedit');
Route::get('/fifthdbcoursenotedelete/{id}/{courseid}', 'FifthDbNoteController@delete')->name('fifthdbcoursenotedelete');
Route::post('/fifthdbcoursenoteupdate/{id}/{courseid}', 'FifthDbNoteController@update')->name('fifthdbcoursenoteupdate');
Route::get('/fifthdbcoursenotedetail/{id}/{courseid}', 'FifthDbNoteController@viewnote')->name('fifthdbcoursenotedetail');
Route::get('/ufifthdbcoursenotedetail/{id}/{courseid}', 'FifthDbNoteController@uviewnote')->name('ufifthdbcoursenotedetail');
Route::post('/add_fifthdbcoursenote/{id}', 'FifthDbNoteController@save')->name('daddfifthcoursenote');
Route::get('/add_fifthdbcoursenote/{id}', 'FifthDbNoteController@add')->name('dsavefifthcoursenote');

//routes related to fifth dbs course controller
Route::get('/fifthdbcoursequestionlist/{id}', 'FifthDbCourseController@courseQuestionList')->name('fifthdbcoursequestionlist');
Route::get('/fifthdbcoursenotelist/{id}', 'FifthDbCourseController@courseNoteList')->name('fifthdbcoursenotelist');
Route::get('/ufifthdbcoursequestionlist/{id}', 'FifthDbCourseController@ucourseQuestionList')->name('ufifthdbcoursequestionlist');
Route::get('/ufifthdbcoursenotelist/{id}', 'FifthDbCourseController@ucourseNoteList')->name('ufifthdbcoursenotelist');
Route::get('/fifthdbcoursecontent/{id}', function($id){
    return view('fifthdb/course/fifthdbcoursecontent')->with('courseid', $id);})->name('fifthdbcoursecontent');
Route::get('/ufifthdbcoursecontent/{id}', function($id){
    return view('fifthdb/course/ufifthdbcoursecontent')->with('courseid', $id);})->name('ufifthdbcoursecontent');
Route::get('/', 'HomeController@index');
Route::get('/fifthdbcoursedelete/{id}', 'FifthDbCourseController@delete')->name('fifthdbcoursedelete');
Route::post('/fifthdbcourseupdate/{id}', 'FifthDbCourseController@update')->name('fifthdbcourseupdate');
Route::get('/fifthdbcourseedit/{id}', 'FifthDbCourseController@edit')->name('fifthdbcourseedit');
Route::get('/fifthdbcourselist', 'FifthDbCourseController@index')->name('fifthdbcourselist');
Route::get('/ufifthdbcourselist', 'FifthDbCourseController@uindex')->name('ufifthdbcourselist');
Route::get('/add_fifthdbcourse', 'FifthDbCourseController@add');
Route::post('/add_fifthdbcourse', 'FifthDbCourseController@save');


//routes related to fifth mbbs pastquestions controller
Route::get('/fifthmbcoursequestionedit/{id}/{courseid}', 'FifthMbPastQuestionController@edit')->name('fifthmbcoursequestionedit');
Route::get('/fifthmbcoursequestiondelete/{id}/{courseid}', 'FifthMbPastQuestionController@delete')->name('fifthmbcoursequestiondelete');
Route::post('/fifthmbcoursequestionupdate/{id}/{courseid}', 'FifthMbPastQuestionController@update')->name('fifthmbcoursequestionupdate');
Route::get('/fifthmbcoursequestiondetail/{id}/{courseid}', 'FifthMbPastQuestionController@viewquestion')->name('fifthmbcoursequestiondetail');
Route::post('/add_fifthmbcoursequestion/{id}', 'FifthMbPastQuestionController@save')->name('addfifthcoursequestion');
Route::get('/add_fifthmbcoursequestion/{id}', 'FifthMbPastQuestionController@add')->name('savefifthcoursequestion');

//routes related to  fifth mbbs notes controller
Route::get('/fifthmbcoursenoteedit/{id}/{courseid}', 'FifthMbNoteController@edit')->name('fifthmbcoursenoteedit');
Route::get('/fifthmbcoursenotedelete/{id}/{courseid}', 'FifthMbNoteController@delete')->name('fifthmbcoursenotedelete');
Route::post('/fifthmbcoursenoteupdate/{id}/{courseid}', 'FifthMbNoteController@update')->name('fifthmbcoursenoteupdate');
Route::get('/fifthmbcoursenotedetail/{id}/{courseid}', 'FifthMbNoteController@viewnote')->name('fifthmbcoursenotedetail');
Route::post('/add_fifthmbcoursenote/{id}', 'FifthMbNoteController@save')->name('addfifthcoursenote');
Route::get('/add_fifthmbcoursenote/{id}', 'FifthMbNoteController@add')->name('savefifthcoursenote');

//routes related to fifth mbbs course controller
Route::get('/fifthmbcoursequestionlist/{id}', 'FifthMbCourseController@courseQuestionList')->name('fifthmbcoursequestionlist');
Route::get('/fifthmbcoursenotelist/{id}', 'FifthMbCourseController@courseNoteList')->name('fifthmbcoursenotelist');
Route::get('/fifthmbcoursecontent/{id}', function($id){
    return view('fifthmb/course/fifthmbcoursecontent')->with('courseid', $id);})->name('fifthmbcoursecontent');
Route::get('/', 'HomeController@index');
Route::get('/fifthmbcoursedelete/{id}', 'FifthMbCourseController@delete')->name('fifthmbcoursedelete');
Route::post('/fifthmbcourseupdate/{id}', 'FifthMbCourseController@update')->name('fifthmbcourseupdate');
Route::get('/fifthmbcourseedit/{id}', 'FifthMbCourseController@edit')->name('fifthmbcourseedit');
Route::get('/fifthmbcourselist', 'FifthMbCourseController@index')->name('fifthmbcourselist');
Route::get('/add_fifthmbcourse', 'FifthMbCourseController@add');
Route::post('/add_fifthmbcourse', 'FifthMbCourseController@save');


//routes related to fourth dbs pastquestions controller
Route::get('/fourthdbcoursequestionedit/{id}/{courseid}', 'FourthDbPastQuestionController@edit')->name('fourthdbcoursequestionedit');
Route::get('/fourthdbcoursequestiondelete/{id}/{courseid}', 'FourthDbPastQuestionController@delete')->name('fourthdbcoursequestiondelete');
Route::post('/fourthdbcoursequestionupdate/{id}/{courseid}', 'FourthDbPastQuestionController@update')->name('fourthdbcoursequestionupdate');
Route::get('/fourthdbcoursequestiondetail/{id}/{courseid}', 'FourthDbPastQuestionController@viewquestion')->name('fourthdbcoursequestiondetail');
Route::get('/ufourthdbcoursequestiondetail/{id}/{courseid}', 'FourthDbPastQuestionController@uviewquestion')->name('ufourthdbcoursequestiondetail');
Route::post('/add_fourthdbcoursequestion/{id}', 'FourthDbPastQuestionController@save')->name('daddfourthcoursequestion');
Route::get('/add_fourthdbcoursequestion/{id}', 'FourthDbPastQuestionController@add')->name('dsavefourthcoursequestion');

//routes related to  fourth dbs notes controller
Route::get('/fourthdbcoursenoteedit/{id}/{courseid}', 'FourthDbNoteController@edit')->name('fourthdbcoursenoteedit');
Route::get('/fourthdbcoursenotedelete/{id}/{courseid}', 'FourthDbNoteController@delete')->name('fourthdbcoursenotedelete');
Route::post('/fourthdbcoursenoteupdate/{id}/{courseid}', 'FourthDbNoteController@update')->name('fourthdbcoursenoteupdate');
Route::get('/fourthdbcoursenotedetail/{id}/{courseid}', 'FourthDbNoteController@viewnote')->name('fourthdbcoursenotedetail');
Route::get('/ufourthdbcoursenotedetail/{id}/{courseid}', 'FourthDbNoteController@uviewnote')->name('ufourthdbcoursenotedetail');
Route::post('/add_fourthdbcoursenote/{id}', 'FourthDbNoteController@save')->name('daddfourthcoursenote');
Route::get('/add_fourthdbcoursenote/{id}', 'FourthDbNoteController@add')->name('dsavefourthcoursenote');

//routes related to fourth dbs course controller
Route::get('/fourthdbcoursequestionlist/{id}', 'FourthDbCourseController@courseQuestionList')->name('fourthdbcoursequestionlist');
Route::get('/ufourthdbcoursequestionlist/{id}', 'FourthDbCourseController@ucourseQuestionList')->name('ufourthdbcoursequestionlist');
Route::get('/fourthdbcoursenotelist/{id}', 'FourthDbCourseController@courseNoteList')->name('fourthdbcoursenotelist');
Route::get('/ufourthdbcoursenotelist/{id}', 'FourthDbCourseController@ucourseNoteList')->name('ufourthdbcoursenotelist');
Route::get('/fourthdbcoursecontent/{id}', function($id){
    return view('fourthdb/course/fourthdbcoursecontent')->with('courseid', $id);})->name('fourthdbcoursecontent');
Route::get('/ufourthdbcoursecontent/{id}', function($id){
    return view('fourthdb/course/ufourthdbcoursecontent')->with('courseid', $id);})->name('ufourthdbcoursecontent');
Route::get('/', 'HomeController@index');
Route::get('/fourthdbcoursedelete/{id}', 'FourthDbCourseController@delete')->name('fourthdbcoursedelete');
Route::post('/fourthdbcourseupdate/{id}', 'FourthDbCourseController@update')->name('fourthdbcourseupdate');
Route::get('/fourthdbcourseedit/{id}', 'FourthDbCourseController@edit')->name('fourthdbcourseedit');
Route::get('/fourthdbcourselist', 'FourthDbCourseController@index')->name('fourthdbcourselist');
Route::get('/ufourthdbcourselist', 'FourthDbCourseController@uindex')->name('ufourthdbcourselist');
Route::get('/add_fourthdbcourse', 'FourthDbCourseController@add');
Route::post('/add_fourthdbcourse', 'FourthDbCourseController@save');

//routes related to fourth mbbs pastquestions controller
Route::get('/fourthmbcoursequestionedit/{id}/{courseid}', 'FourthMbPastQuestionController@edit')->name('fourthmbcoursequestionedit');
Route::get('/fourthmbcoursequestiondelete/{id}/{courseid}', 'FourthMbPastQuestionController@delete')->name('fourthmbcoursequestiondelete');
Route::post('/fourthmbcoursequestionupdate/{id}/{courseid}', 'FourthMbPastQuestionController@update')->name('fourthmbcoursequestionupdate');
Route::get('/fourthmbcoursequestiondetail/{id}/{courseid}', 'FourthMbPastQuestionController@viewquestion')->name('fourthmbcoursequestiondetail');
Route::get('/ufourthmbcoursequestiondetail/{id}/{courseid}', 'FourthMbPastQuestionController@uviewquestion')->name('ufourthmbcoursequestiondetail');
Route::post('/add_fourthmbcoursequestion/{id}', 'FourthMbPastQuestionController@save')->name('addfourthcoursequestion');
Route::get('/add_fourthmbcoursequestion/{id}', 'FourthMbPastQuestionController@add')->name('savefourthcoursequestion');

//routes related to  fourth mbbs notes controller
Route::get('/fourthmbcoursenoteedit/{id}/{courseid}', 'FourthMbNoteController@edit')->name('fourthmbcoursenoteedit');
Route::get('/fourthmbcoursenotedelete/{id}/{courseid}', 'FourthMbNoteController@delete')->name('fourthmbcoursenotedelete');
Route::post('/fourthmbcoursenoteupdate/{id}/{courseid}', 'FourthMbNoteController@update')->name('fourthmbcoursenoteupdate');
Route::get('/fourthmbcoursenotedetail/{id}/{courseid}', 'FourthMbNoteController@viewnote')->name('fourthmbcoursenotedetail');
Route::get('/ufourthmbcoursenotedetail/{id}/{courseid}', 'FourthMbNoteController@uviewnote')->name('ufourthmbcoursenotedetail');
Route::post('/add_fourthmbcoursenote/{id}', 'FourthMbNoteController@save')->name('addfourthcoursenote');
Route::get('/add_fourthmbcoursenote/{id}', 'FourthMbNoteController@add')->name('savefourthcoursenote');

//routes related to fourth mbbs course controller
Route::get('/fourthmbcoursequestionlist/{id}', 'FourthMbCourseController@courseQuestionList')->name('fourthmbcoursequestionlist');
Route::get('/ufourthmbcoursequestionlist/{id}', 'FourthMbCourseController@ucourseQuestionList')->name('ufourthmbcoursequestionlist');
Route::get('/fourthmbcoursenotelist/{id}', 'FourthMbCourseController@courseNoteList')->name('fourthmbcoursenotelist');
Route::get('/ufourthmbcoursenotelist/{id}', 'FourthMbCourseController@ucourseNoteList')->name('ufourthmbcoursenotelist');
Route::get('/fourthmbcoursecontent/{id}', function($id){
    return view('fourthmb/course/fourthmbcoursecontent')->with('courseid', $id);})->name('fourthmbcoursecontent');
Route::get('/ufourthmbcoursecontent/{id}', function($id){
    return view('fourthmb/course/ufourthmbcoursecontent')->with('courseid', $id);})->name('ufourthmbcoursecontent');
Route::get('/', 'HomeController@index');
Route::get('/fourthmbcoursedelete/{id}', 'FourthMbCourseController@delete')->name('fourthmbcoursedelete');
Route::post('/fourthmbcourseupdate/{id}', 'FourthMbCourseController@update')->name('fourthmbcourseupdate');
Route::get('/fourthmbcourseedit/{id}', 'FourthMbCourseController@edit')->name('fourthmbcourseedit');
Route::get('/fourthmbcourselist', 'FourthMbCourseController@index')->name('fourthmbcourselist');
Route::get('/ufourthmbcourselist', 'FourthMbCourseController@uindex')->name('ufourthmbcourselist');
Route::get('/add_fourthmbcourse', 'FourthMbCourseController@add');
Route::post('/add_fourthmbcourse', 'FourthMbCourseController@save');


//routes related to third dbs pastquestions controller
Route::get('/thirddbcoursequestionedit/{id}/{courseid}', 'ThirdDbPastQuestionController@edit')->name('thirddbcoursequestionedit');
Route::get('/thirddbcoursequestiondelete/{id}/{courseid}', 'ThirdDbPastQuestionController@delete')->name('thirddbcoursequestiondelete');
Route::post('/thirddbcoursequestionupdate/{id}/{courseid}', 'ThirdDbPastQuestionController@update')->name('thirddbcoursequestionupdate');
Route::get('/thirddbcoursequestiondetail/{id}/{courseid}', 'ThirdDbPastQuestionController@viewquestion')->name('thirddbcoursequestiondetail');
Route::get('/uthirddbcoursequestiondetail/{id}/{courseid}', 'ThirdDbPastQuestionController@uviewquestion')->name('uthirddbcoursequestiondetail');
Route::post('/add_thirddbcoursequestion/{id}', 'ThirdDbPastQuestionController@save')->name('daddthirdcoursequestion');
Route::get('/add_thirddbcoursequestion/{id}', 'ThirdDbPastQuestionController@add')->name('dsavethirdcoursequestion');

//routes related to  third dbs notes controller
Route::get('/thirddbcoursenoteedit/{id}/{courseid}', 'ThirdDbNoteController@edit')->name('thirddbcoursenoteedit');
Route::get('/thirddbcoursenotedelete/{id}/{courseid}', 'ThirdDbNoteController@delete')->name('thirddbcoursenotedelete');
Route::post('/thirddbcoursenoteupdate/{id}/{courseid}', 'ThirdDbNoteController@update')->name('thirddbcoursenoteupdate');
Route::get('/thirddbcoursenotedetail/{id}/{courseid}', 'ThirdDbNoteController@viewnote')->name('thirddbcoursenotedetail');
Route::get('/uthirddbcoursenotedetail/{id}/{courseid}', 'ThirdDbNoteController@uviewnote')->name('uthirddbcoursenotedetail');
Route::post('/add_thirddbcoursenote/{id}', 'ThirdDbNoteController@save')->name('daddthirdcoursenote');
Route::get('/add_thirddbcoursenote/{id}', 'ThirdDbNoteController@add')->name('dsavethirdcoursenote');

//routes related to third dbs course controller
Route::get('/thirddbcoursequestionlist/{id}', 'ThirdDbCourseController@courseQuestionList')->name('thirddbcoursequestionlist');
Route::get('/uthirddbcoursequestionlist/{id}', 'ThirdDbCourseController@ucourseQuestionList')->name('uthirddbcoursequestionlist');
Route::get('/thirddbcoursenotelist/{id}', 'ThirdDbCourseController@courseNoteList')->name('thirddbcoursenotelist');
Route::get('/uthirddbcoursenotelist/{id}', 'ThirdDbCourseController@ucourseNoteList')->name('uthirddbcoursenotelist');
Route::get('/thirddbcoursecontent/{id}', function($id){
    return view('thirddb/course/thirddbcoursecontent')->with('courseid', $id);})->name('thirddbcoursecontent');
Route::get('/uthirddbcoursecontent/{id}', function($id){
    return view('thirddb/course/uthirddbcoursecontent')->with('courseid', $id);})->name('uthirddbcoursecontent');
Route::get('/', 'HomeController@index');
Route::get('/thirddbcoursedelete/{id}', 'ThirdDbCourseController@delete')->name('thirddbcoursedelete');
Route::post('/thirddbcourseupdate/{id}', 'ThirdDbCourseController@update')->name('thirddbcourseupdate');
Route::get('/thirddbcourseedit/{id}', 'ThirdDbCourseController@edit')->name('thirddbcourseedit');
Route::get('/thirddbcourselist', 'ThirdDbCourseController@index')->name('thirddbcourselist');
Route::get('/uthirddbcourselist', 'ThirdDbCourseController@uindex')->name('uthirddbcourselist');
Route::get('/add_thirddbcourse', 'ThirdDbCourseController@add');
Route::post('/add_thirddbcourse', 'ThirdDbCourseController@save');

//routes related to third mbbs pastquestions controller
Route::get('/thirdmbcoursequestionedit/{id}/{courseid}', 'ThirdMbPastQuestionController@edit')->name('thirdmbcoursequestionedit');
Route::get('/thirdmbcoursequestiondelete/{id}/{courseid}', 'ThirdMbPastQuestionController@delete')->name('thirdmbcoursequestiondelete');
Route::post('/thirdmbcoursequestionupdate/{id}/{courseid}', 'ThirdMbPastQuestionController@update')->name('thirdmbcoursequestionupdate');
Route::get('/thirdmbcoursequestiondetail/{id}/{courseid}', 'ThirdMbPastQuestionController@viewquestion')->name('thirdmbcoursequestiondetail');
Route::get('/uthirdmbcoursequestiondetail/{id}/{courseid}', 'ThirdMbPastQuestionController@uviewquestion')->name('uthirdmbcoursequestiondetail');
Route::post('/add_thirdmbcoursequestion/{id}', 'ThirdMbPastQuestionController@save')->name('addthirdcoursequestion');
Route::get('/add_thirdmbcoursequestion/{id}', 'ThirdMbPastQuestionController@add')->name('savethirdcoursequestion');

//routes related to  third mbbs notes controller
Route::get('/thirdmbcoursenoteedit/{id}/{courseid}', 'ThirdMbNoteController@edit')->name('thirdmbcoursenoteedit');
Route::get('/thirdmbcoursenotedelete/{id}/{courseid}', 'ThirdMbNoteController@delete')->name('thirdmbcoursenotedelete');
Route::post('/thirdmbcoursenoteupdate/{id}/{courseid}', 'ThirdMbNoteController@update')->name('thirdmbcoursenoteupdate');
Route::get('/thirdmbcoursenotedetail/{id}/{courseid}', 'ThirdMbNoteController@viewnote')->name('thirdmbcoursenotedetail');
Route::get('/uthirdmbcoursenotedetail/{id}/{courseid}', 'ThirdMbNoteController@uviewnote')->name('uthirdmbcoursenotedetail');
Route::post('/add_thirdmbcoursenote/{id}', 'ThirdMbNoteController@save')->name('addthirdcoursenote');
Route::get('/add_thirdmbcoursenote/{id}', 'ThirdMbNoteController@add')->name('savethirdcoursenote');

//routes related to third mmbs course controller
Route::get('/thirdmbcoursequestionlist/{id}', 'ThirdMbCourseController@courseQuestionList')->name('thirdmbcoursequestionlist');
Route::get('/uthirdmbcoursequestionlist/{id}', 'ThirdMbCourseController@ucourseQuestionList')->name('uthirdmbcoursequestionlist');
Route::get('/thirdmbcoursenotelist/{id}', 'ThirdMbCourseController@courseNoteList')->name('thirdmbcoursenotelist');
Route::get('/uthirdmbcoursenotelist/{id}', 'ThirdMbCourseController@ucourseNoteList')->name('uthirdmbcoursenotelist');
Route::get('/thirdmbcoursecontent/{id}', function($id){
    return view('thirdmb/course/thirdmbcoursecontent')->with('courseid', $id);})->name('thirdmbcoursecontent');
Route::get('/uthirdmbcoursecontent/{id}', function($id){
    return view('thirdmb/course/uthirdmbcoursecontent')->with('courseid', $id);})->name('uthirdmbcoursecontent');
Route::get('/', 'HomeController@index');
Route::get('/thirdmbcoursedelete/{id}', 'ThirdMbCourseController@delete')->name('thirdmbcoursedelete');
Route::post('/thirdmbcourseupdate/{id}', 'ThirdMbCourseController@update')->name('thirdmbcourseupdate');
Route::get('/thirdmbcourseedit/{id}', 'ThirdMbCourseController@edit')->name('thirdmbcourseedit');
Route::get('/thirdmbcourselist', 'ThirdMbCourseController@index')->name('thirdmbcourselist');
Route::get('/uthirdmbcourselist', 'ThirdMbCourseController@uindex')->name('uthirdmbcourselist');
Route::get('/add_thirdmbcourse', 'ThirdMbCourseController@add');
Route::post('/add_thirdmbcourse', 'ThirdMbCourseController@save');


//routes related to second dbs pastquestions controller
Route::get('/secdbcoursequestionedit/{id}/{courseid}', 'SecDbPastQuestionController@edit')->name('secdbcoursequestionedit');
Route::get('/secdbcoursequestiondelete/{id}/{courseid}', 'SecDbPastQuestionController@delete')->name('secdbcoursequestiondelete');
Route::post('/secdbcoursequestionupdate/{id}/{courseid}', 'SecDbPastQuestionController@update')->name('secdbcoursequestionupdate');
Route::get('/secdbcoursequestiondetail/{id}/{courseid}', 'SecDbPastQuestionController@viewquestion')->name('secdbcoursequestiondetail');
Route::get('/usecdbcoursequestiondetail/{id}/{courseid}', 'SecDbPastQuestionController@uviewquestion')->name('usecdbcoursequestiondetail');
Route::post('/add_secdbcoursequestion/{id}', 'SecDbPastQuestionController@save')->name('daddcoursequestion');
Route::get('/add_secdbcoursequestion/{id}', 'SecDbPastQuestionController@add')->name('savecoursequestion');

//routes related to second dbs notes controller
Route::get('/secdbcoursenoteedit/{id}/{courseid}', 'SecDbNoteController@edit')->name('secdbcoursenoteedit');
Route::get('/secdbcoursenotedelete/{id}/{courseid}', 'SecDbNoteController@delete')->name('secdbcoursenotedelete');
Route::post('/secdbcoursenoteupdate/{id}/{courseid}', 'SecDbNoteController@update')->name('secdbcoursenoteupdate');
Route::get('/secdbcoursenotedetail/{id}/{courseid}', 'SecDbNoteController@viewnote')->name('secdbcoursenotedetail');
Route::get('/usecdbcoursenotedetail/{id}/{courseid}', 'SecDbNoteController@uviewnote')->name('usecdbcoursenotedetail');
Route::post('/add_secdbcoursenote/{id}', 'SecDbNoteController@save')->name('daddcoursenote');
Route::get('/add_secdbcoursenote/{id}', 'SecDbNoteController@add')->name('savecoursenote');

//routes related to second dbs course controller
Route::get('/secdbcoursequestionlist/{id}', 'SecDbCourseController@courseQuestionList')->name('secdbcoursequestionlist');
Route::get('/usecdbcoursequestionlist/{id}', 'SecDbCourseController@ucourseQuestionList')->name('usecdbcoursequestionlist');
Route::get('/secdbcoursenotelist/{id}', 'SecDbCourseController@courseNoteList')->name('secdbcoursenotelist');
Route::get('/usecdbcoursenotelist/{id}', 'SecDbCourseController@ucourseNoteList')->name('usecdbcoursenotelist');
Route::get('/secdbcoursecontent/{id}', function($id){
    return view('secdb/course/secdbcoursecontent')->with('courseid', $id);})->name('secdbcoursecontent');
Route::get('/usecdbcoursecontent/{id}', function($id){
    return view('secdb/course/usecdbcoursecontent')->with('courseid', $id);})->name('usecdbcoursecontent');
Route::get('/', 'HomeController@index');
Route::get('/secdbcoursedelete/{id}', 'SecDbCourseController@delete')->name('secdbcoursedelete');
Route::post('/secdbcourseupdate/{id}', 'SecDbCourseController@update')->name('secdbcourseupdate');
Route::get('/secdbcourseedit/{id}', 'SecDbCourseController@edit')->name('secdbcourseedit');
Route::get('/secdbcourselist', 'SecDbCourseController@index')->name('secdbcourselist');
Route::get('/usecdbcourselist', 'SecDbCourseController@uindex')->name('usecdbcourselist');
Route::get('/add_secdbcourse', 'SecDbCourseController@add');
Route::post('/add_secdbcourse', 'SecDbCourseController@save');

//routes related to second mbbs pastquestions controller
Route::get('/secmbcoursequestionedit/{id}/{courseid}', 'SecMbPastQuestionController@edit')->name('secmbcoursequestionedit');
Route::get('/secmbcoursequestiondelete/{id}/{courseid}', 'SecMbPastQuestionController@delete')->name('secmbcoursequestiondelete');
Route::post('/secmbcoursequestionupdate/{id}/{courseid}', 'SecMbPastQuestionController@update')->name('secmbcoursequestionupdate');
Route::get('/secmbcoursequestiondetail/{id}/{courseid}', 'SecMbPastQuestionController@viewquestion')->name('secmbcoursequestiondetail');
Route::get('/usecmbcoursequestiondetail/{id}/{courseid}', 'SecMbPastQuestionController@uviewquestion')->name('usecmbcoursequestiondetail');
Route::post('/add_secmbcoursequestion/{id}', 'SecMbPastQuestionController@save')->name('addcoursequestion');
Route::get('/add_secmbcoursequestion/{id}', 'SecMbPastQuestionController@add')->name('savecoursequestion');

//routes related to second mbbs notes controller
Route::get('/secmbcoursenoteedit/{id}/{courseid}', 'SecMbNoteController@edit')->name('secmbcoursenoteedit');
Route::get('/secmbcoursenotedelete/{id}/{courseid}', 'SecMbNoteController@delete')->name('secmbcoursenotedelete');
Route::post('/secmbcoursenoteupdate/{id}/{courseid}', 'SecMbNoteController@update')->name('secmbcoursenoteupdate');
Route::get('/secmbcoursenotedetail/{id}/{courseid}', 'SecMbNoteController@viewnote')->name('secmbcoursenotedetail');
Route::get('/usecmbcoursenotedetail/{id}/{courseid}', 'SecMbNoteController@uviewnote')->name('usecmbcoursenotedetail');
Route::post('/add_secmbcoursenote/{id}', 'SecMbNoteController@save')->name('addcoursenote');
Route::get('/add_secmbcoursenote/{id}', 'SecMbNoteController@add')->name('savecoursenote');

//routes related to second mbbs course controller
Route::get('/secmbcoursequestionlist/{id}', 'SecMbCourseController@courseQuestionList')->name('secmbcoursequestionlist');
Route::get('/usecmbcoursequestionlist/{id}', 'SecMbCourseController@ucourseQuestionList')->name('usecmbcoursequestionlist');
Route::get('/secmbcoursenotelist/{id}', 'SecMbCourseController@courseNoteList')->name('secmbcoursenotelist');
Route::get('/usecmbcoursenotelist/{id}', 'SecMbCourseController@ucourseNoteList')->name('usecmbcoursenotelist');
Route::get('/secmbcoursecontent/{id}', function($id){
    return view('secmb/course/secmbcoursecontent')->with('courseid', $id);})->name('secmbcoursecontent');
Route::get('/usecmbcoursecontent/{id}', function($id){
    return view('secmb/course/usecmbcoursecontent')->with('courseid', $id);})->name('usecmbcoursecontent');
Route::get('/', 'HomeController@index');
Route::get('/secmbcoursedelete/{id}', 'SecMbCourseController@delete')->name('secmbcoursedelete');
Route::post('/secmbcourseupdate/{id}', 'SecMbCourseController@update')->name('secmbcourseupdate');
Route::get('/secmbcourseedit/{id}', 'SecMbCourseController@edit')->name('secmbcourseedit');
Route::get('/secmbcourselist', 'SecMbCourseController@index')->name('secmbcourselist');
Route::get('/usecmbcourselist', 'SecMbCourseController@uindex')->name('usecmbcourselist');
Route::get('/add_secmbcourse', 'SecMbCourseController@add');
Route::post('/add_secmbcourse', 'SecMbCourseController@save');


Route::get('/mnotes', function(){
    return view('mnotes');
    })->name('mnotes');

Route::get('/dnotes', function(){
    return view('dnotes');
})->name('dnotes');
//Route::get('/mvideos', 'mvideos@index')->name('mvideos');
//Route::get('/mquestions', 'mquestions@index')->name('mquestions');
//Route::get('/dvideos', 'dvideos@index')->name('dvideos');
//Route::get('/dquestions', 'dquestions@index')->name('dquestions');

Route::get('admin_register', 'AdminAuth\RegisterController@showRegistrationForm');
Route::post('admin_register', 'AdminAuth\RegisterController@register')->name('adminregister');
Route::post('admin_logout', 'AdminAuth\LoginController@logout')->name('adminlogout');
Route::get('admin_login', 'AdminAuth\LoginController@showLoginForm');
Route::post('admin_login', 'AdminAuth\LoginController@login');

Route::get('/admin_home', function(){
    return view('admin.home');
})->name('admin_dashboard');

//Logged in users/admin cannot access or send requests these pages
Route::group(['middleware' => 'admin_guest'], function() {

    Route::get('admin_register', 'AdminAuth\RegisterController@showRegistrationForm')->name('adminregister');
    Route::post('admin_register', 'AdminAuth\RegisterController@register');
    Route::get('admin_login', 'AdminAuth\LoginController@showLoginForm');
    Route::post('admin_login', 'AdminAuth\LoginController@login');

    //Password reset routes
    Route::get('admin_password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
    Route::post('admin_password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('admin_password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
    Route::post('admin_password/reset', 'AdminAuth\ResetPasswordController@reset');


});



//Only logged in admins can access or send requests to these pages
Route::group(['middleware' => 'admin_auth'], function(){

    Route::post('admin_logout', 'AdminAuth\LoginController@logout');

//    Route::get('/admin_home', function(){
//        return view('admin.home');
//    });

});

Auth::routes();

Route::post('/login/custom', [

    'uses'=>'CustomLoginController@login',
    'as'=>'login.custom'
]);

Route::get('/home', 'HomeController@index');
