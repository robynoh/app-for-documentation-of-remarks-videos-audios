<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/all-events','App\Http\Controllers\resultController@allevents')->name('allevents');
Route::get('/infrastructure/{val}/{id}','App\Http\Controllers\resultController@oneinfra')->name('oneinfra');
Route::get('/physical-dev','App\Http\Controllers\resultController@physicaldev')->name('physicaldev');
Route::get('/faq','App\Http\Controllers\resultController@faq')->name('faq');

Route::get('/biography','App\Http\Controllers\resultController@biography')->name('biography');


Route::get('/social-investment','App\Http\Controllers\resultController@socialinvestment')->name('socialinvestment');
Route::get('/investment/{val}/{id}','App\Http\Controllers\resultController@socialinvest')->name('socialinvest');
Route::get('/social-investment/{val}/','App\Http\Controllers\resultController@otherinvest')->name('otherinvest');

Route::get('/page-search','App\Http\Controllers\resultController@pagesearch')->name('pagesearch');
Route::get('/investment-search','App\Http\Controllers\resultController@investsearch')->name('investsearch');
Route::get('/project-search','App\Http\Controllers\resultController@projectsearch')->name('projectsearch');

Route::get('/remark/{title}/{id}','App\Http\Controllers\resultController@remarkdetail')->name('remarkdetail');
Route::get('/', function () {
    return view('welcome2');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () { return view('dashboard');})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->post('/results', 'App\Http\Controllers\resultController@resultscalculation')->name('resultscalculation');
Route::middleware(['auth:sanctum', 'verified'])->get('filterstudent', 'App\Http\Controllers\resultController@pullstudent')->name('pullstudentsearch');
Route::middleware(['auth:sanctum', 'verified'])->get('staffs', 'App\Http\Controllers\resultController@staff')->name('staff');
Route::middleware(['auth:sanctum', 'verified'])->get('student/delete/{student}', 'App\Http\Controllers\resultController@student_delete')->name('student.delete');
Route::middleware(['auth:sanctum', 'verified'])->get('staff/delete/{staff}', 'App\Http\Controllers\resultController@staff_delete')->name('staff.delete');
Route::middleware(['auth:sanctum', 'verified'])->get('school/delete/{school}', 'App\Http\Controllers\resultController@school_delete')->name('school.delete');

Route::middleware(['auth:sanctum', 'verified'])->get('programs', 'App\Http\Controllers\resultController@programs')->name('programs');

Route::middleware(['auth:sanctum', 'verified'])->get('all-speeches', 'App\Http\Controllers\resultController@allspeech')->name('allspeech');
Route::middleware(['auth:sanctum', 'verified'])->get('all-videos', 'App\Http\Controllers\resultController@allvideo')->name('allvideo');

Route::middleware(['auth:sanctum', 'verified'])->post('all-speeches', 'App\Http\Controllers\resultController@postspeech')->name('postspeech');


Route::middleware(['auth:sanctum', 'verified'])->get('all-audios', 'App\Http\Controllers\resultController@allaudio')->name('allaudio');

Route::middleware(['auth:sanctum', 'verified'])->get('events/delete/{staff}', 'App\Http\Controllers\resultController@event_delete')->name('event.delete');

Route::middleware(['auth:sanctum', 'verified'])->get('speech/delete/{speech}', 'App\Http\Controllers\resultController@speech_delete')->name('speech.delete');
Route::middleware(['auth:sanctum', 'verified'])->get('video/delete/{video}', 'App\Http\Controllers\resultController@video_delete')->name('speech.delete');
Route::middleware(['auth:sanctum', 'verified'])->get('file/delete/{file}', 'App\Http\Controllers\resultController@file_delete')->name('audio.delete');

Route::middleware(['auth:sanctum', 'verified'])->get('audio/delete/{audio}', 'App\Http\Controllers\resultController@audio_delete')->name('audio.delete');
Route::middleware(['auth:sanctum', 'verified'])->get('photo/delete/{photo}', 'App\Http\Controllers\resultController@photo_delete')->name('photo.delete');

Route::middleware(['auth:sanctum', 'verified'])->get('infraphoto/delete/{photo}', 'App\Http\Controllers\resultController@infraphoto_delete')->name('infraphoto.delete');

Route::middleware(['auth:sanctum', 'verified'])->get('investphoto/delete/{photo}', 'App\Http\Controllers\resultController@investphoto_delete')->name('investphoto.delete');


Route::middleware(['auth:sanctum', 'verified'])->get('photo/pullphotodetail/{photo}', 'App\Http\Controllers\resultController@pullphoto')->name('pull.photo');

Route::middleware(['auth:sanctum', 'verified'])->get('photo/pullinfraphotodetail/{photo}', 'App\Http\Controllers\resultController@pullinfraphoto')->name('pullinfraphoto');

Route::middleware(['auth:sanctum', 'verified'])->get('photo/pullinvestphotodetail/{photo}', 'App\Http\Controllers\resultController@pullinvestphoto')->name('pullinvestphoto');

Route::middleware(['auth:sanctum', 'verified'])->get('all/photos/{photo}', 'App\Http\Controllers\resultController@all_photos')->name('photos');

Route::middleware(['auth:sanctum', 'verified'])->post('add_school', 'App\Http\Controllers\resultController@add_school')->name('add_school');
Route::middleware(['auth:sanctum', 'verified'])->get('pullusersdetail/{user}', 'App\Http\Controllers\resultController@pullusersdetail')->name('pullusersdetail');
Route::middleware(['auth:sanctum', 'verified'])->get('decrypt/{password}', 'App\Http\Controllers\resultController@decryptharsh')->name('decrypt.harsh');
Route::middleware(['auth:sanctum', 'verified'])->get('pulladmindetail/{user}', 'App\Http\Controllers\resultController@pulladmindetail')->name('pulladmindetail');

Route::middleware(['auth:sanctum', 'verified'])->get('add_staff', 'App\Http\Controllers\resultController@new_staff')->name('new_staff');
Route::middleware(['auth:sanctum', 'verified'])->post('add_staff', 'App\Http\Controllers\resultController@staffPost')->name('post.staff');
Route::middleware(['auth:sanctum', 'verified'])->get('pullstudentdetail/{student}', 'App\Http\Controllers\resultController@pullstudentdetail')->name('student.detail');
Route::middleware(['auth:sanctum', 'verified'])->get('pullstudentphoto/{exam_no}', 'App\Http\Controllers\resultController@pullstudentphoto')->name('student.post');
Route::middleware(['auth:sanctum', 'verified'])->get('pullschoolname/{school}', 'App\Http\Controllers\resultController@pullschoolname')->name('student.school');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit_student/{student}', 'App\Http\Controllers\resultController@edit_student')->name('student.edit');
Route::middleware(['auth:sanctum', 'verified'])->get('pullstaffdetail/{staff}', 'App\Http\Controllers\resultController@pullstaffdetail')->name('staff.detail');
Route::middleware(['auth:sanctum', 'verified'])->get('pulldepartmentname/{department}', 'App\Http\Controllers\resultController@pulldepartmentname')->name('student.department');
Route::middleware(['auth:sanctum', 'verified'])->post('filterdepartment', 'App\Http\Controllers\resultController@filterdepartment')->name('filterdepartment');
Route::middleware(['auth:sanctum', 'verified'])->get('results', 'App\Http\Controllers\resultController@results')->name('results');
Route::middleware(['auth:sanctum', 'verified'])->get('students', 'App\Http\Controllers\resultController@students')->name('students');
Route::middleware(['auth:sanctum', 'verified'])->get('add_student', 'App\Http\Controllers\resultController@add_student')->name('add_student');
Route::middleware(['auth:sanctum', 'verified'])->post('add_student', 'App\Http\Controllers\resultController@post_student')->name('poststudent');
Route::middleware(['auth:sanctum', 'verified'])->get('bulk_upload_student', 'App\Http\Controllers\resultController@bulk_upload_student')->name('bulk_upload');
Route::middleware(['auth:sanctum', 'verified'])->post('bulk_upload_student', 'App\Http\Controllers\resultController@exams_records')->name('bulk_upload_post');
Route::middleware(['auth:sanctum', 'verified'])->put('update_student', 'App\Http\Controllers\resultController@update_student')->name('update.student');
Route::middleware(['auth:sanctum', 'verified'])->post('submitupdate', 'App\Http\Controllers\resultController@submitupdate')->name('submitupdate');
Route::middleware(['auth:sanctum', 'verified'])->post('submituser', 'App\Http\Controllers\resultController@submituser')->name('submituser');

Route::middleware(['auth:sanctum', 'verified'])->post('submitschedule', 'App\Http\Controllers\resultController@submitschedule')->name('submitschedule');
Route::middleware(['auth:sanctum', 'verified'])->get('pullscheduledetail/{event}', 'App\Http\Controllers\resultController@pullscheduledetail')->name('schedule.detail');
Route::middleware(['auth:sanctum', 'verified'])->get('pullinfrastructuredetail/{event}', 'App\Http\Controllers\resultController@pullinfrastructuredetail')->name('pullinfrastructuredetail');

Route::middleware(['auth:sanctum', 'verified'])->get('pullinvestmentdetail/{event}', 'App\Http\Controllers\resultController@pullinvestmentdetail')->name('pullinvestmentdetail');
Route::middleware(['auth:sanctum', 'verified'])->get('pullpoliciesdetail/{event}', 'App\Http\Controllers\resultController@pullpoliciesdetail')->name('pullpoliciesdetail');


Route::middleware(['auth:sanctum', 'verified'])->post('addtranscribe', 'App\Http\Controllers\resultController@addtranscribed')->name('addtranscribes');

Route::middleware(['auth:sanctum', 'verified'])->get('unedited-speeches', 'App\Http\Controllers\resultController@uneditedspeeches')->name('addtranscribes');



Route::middleware(['auth:sanctum', 'verified'])->post('addtranscribe', 'App\Http\Controllers\resultController@addtranscribed')->name('add.transcribe');

Route::middleware(['auth:sanctum', 'verified'])->post('viewtranscribe', 'App\Http\Controllers\resultController@viewtranscribed')->name('view.transcribe');

Route::middleware(['auth:sanctum', 'verified'])->post('addfile/{file}', 'App\Http\Controllers\resultController@addfile')->name('add.file');


Route::middleware(['auth:sanctum', 'verified'])->post('addvideo/{video}', 'App\Http\Controllers\resultController@addvideo')->name('add.video');

Route::middleware(['auth:sanctum', 'verified'])->post('addaudio/{audio}', 'App\Http\Controllers\resultController@addaudio')->name('add.audio');

Route::middleware(['auth:sanctum', 'verified'])->post('addphoto/{photo}', 'App\Http\Controllers\resultController@addphoto')->name('add.photo');


Route::middleware(['auth:sanctum', 'verified'])->post('addinfraphoto/{photo}', 'App\Http\Controllers\resultController@addinfraphoto')->name('addinfraphoto');

Route::middleware(['auth:sanctum', 'verified'])->post('addinvestphoto/{photo}', 'App\Http\Controllers\resultController@addinvestphoto')->name('addinvestphoto');


Route::middleware(['auth:sanctum', 'verified'])->put('update_events', 'App\Http\Controllers\resultController@update_events')->name('update.events');

Route::middleware(['auth:sanctum', 'verified'])->get('event/{event}', 'App\Http\Controllers\resultController@event_media')->name('event.media');

Route::middleware(['auth:sanctum', 'verified'])->get('event-edit/{event}', 'App\Http\Controllers\resultController@editevent')->name('event.media');


Route::middleware(['auth:sanctum', 'verified'])->get('school', 'App\Http\Controllers\resultController@openschool')->name('openschool');
Route::middleware(['auth:sanctum', 'verified'])->get('departments', 'App\Http\Controllers\resultController@departments')->name('departments');
Route::middleware(['auth:sanctum', 'verified'])->post('departments', 'App\Http\Controllers\resultController@add_departments')->name('departments.add');
Route::middleware(['auth:sanctum', 'verified'])->get('department/delete/{delete}', 'App\Http\Controllers\resultController@delete_departments')->name('departments.delete');
Route::middleware(['auth:sanctum', 'verified'])->get('sessions', 'App\Http\Controllers\resultController@sessions')->name('sessions');
Route::middleware(['auth:sanctum', 'verified'])->post('add_session', 'App\Http\Controllers\resultController@add_sessions')->name('add_sessions');
Route::middleware(['auth:sanctum', 'verified'])->get('session/delete/{delete}', 'App\Http\Controllers\resultController@delete_sessions')->name('sessions.delete');
Route::middleware(['auth:sanctum', 'verified'])->get('course', 'App\Http\Controllers\resultController@course')->name('course');
Route::middleware(['auth:sanctum', 'verified'])->post('course', 'App\Http\Controllers\resultController@add_course')->name('add_course');
Route::middleware(['auth:sanctum', 'verified'])->get('grades', 'App\Http\Controllers\resultController@grade')->name('grade');
Route::middleware(['auth:sanctum', 'verified'])->post('grades', 'App\Http\Controllers\resultController@add_grade')->name('grade');
Route::middleware(['auth:sanctum', 'verified'])->get('users', 'App\Http\Controllers\resultController@users')->name('users');

Route::middleware(['auth:sanctum', 'verified'])->get('course/delete/{delete}', 'App\Http\Controllers\resultController@delete_course')->name('course.delete');
Route::middleware(['auth:sanctum', 'verified'])->get('grade/delete/{delete}', 'App\Http\Controllers\resultController@delete_grade')->name('grade.delete');
Route::middleware(['auth:sanctum', 'verified'])->get('user/delete/{user}', 'App\Http\Controllers\resultController@delete_user')->name('user.delete');
Route::middleware(['auth:sanctum', 'verified'])->get('users/delete/{user}', 'App\Http\Controllers\resultController@delete_users')->name('users.delete');
Route::middleware(['auth:sanctum', 'verified'])->get('add_admin_account', 'App\Http\Controllers\resultController@add_admin_account')->name('admin_account');
Route::middleware(['auth:sanctum', 'verified'])->post('add_admin_account', 'App\Http\Controllers\resultController@add_admin_post')->name('admin_account2');

Route::middleware(['auth:sanctum', 'verified'])->get('add_account', 'App\Http\Controllers\resultController@add_account')->name('add.account');
Route::middleware(['auth:sanctum', 'verified'])->post('add_account', 'App\Http\Controllers\resultController@post_account')->name('post.account');
Route::middleware(['auth:sanctum', 'verified'])->get('add_results_csv', 'App\Http\Controllers\resultController@add_resultsx')->name('add.results_csv');
Route::middleware(['auth:sanctum', 'verified'])->post('add_results_csv', 'App\Http\Controllers\resultController@add_results_csv')->name('add.add_results_csv');
///////////////////////////////////////re-visit to change path //////////////////////

Route::get('student_passports/{image}', function($image)
{
    $path ='C:/wamp64/www/dp/student_passports/'. $image;
    if (file_exists($path)) { 
        return Response::download($path);
    }
});

Route::middleware(['auth:sanctum', 'verified'])->get('prep_sheet/{dept}/{school}/{semester}/{session}/{level}', 'App\Http\Controllers\resultController@sheet')->name('result.sheet');
Route::middleware(['auth:sanctum', 'verified'])->post('prep_sheet/{dept}/{school}/{semester}/{session}/{level}', 'App\Http\Controllers\resultController@parameterProcess')->name('processresultparam');
Route::middleware(['auth:sanctum', 'verified'])->get('resultsboard/{session}/{dept}/{semester}/{level}/{school}', 'App\Http\Controllers\resultController@boardswitch')->name('boardswitch');
Route::middleware(['auth:sanctum', 'verified'])->get('app_results', 'App\Http\Controllers\resultController@app_results')->name('app_results');
Route::middleware(['auth:sanctum', 'verified'])->post('app_results2', 'App\Http\Controllers\resultController@post_app_results')->name('post_app_results');
Route::middleware(['auth:sanctum', 'verified'])->post('result_status', 'App\Http\Controllers\resultController@result_approve')->name('result_approve');
Route::middleware(['auth:sanctum', 'verified'])->get('list_of_approve_results', 'App\Http\Controllers\resultController@list_of_approve_results')->name('list_of_approve_results');
Route::middleware(['auth:sanctum', 'verified'])->post('list_of_approve_results', 'App\Http\Controllers\resultController@list_of_approve')->name('list_of_approve');
Route::middleware(['auth:sanctum', 'verified'])->get('regenerate', 'App\Http\Controllers\resultController@regenerate')->name('regenerate');
Route::middleware(['auth:sanctum', 'verified'])->post('regenerate', 'App\Http\Controllers\resultController@regenerate_result')->name('regenerate_result');
Route::middleware(['auth:sanctum', 'verified'])->get('admin_login', 'App\Http\Controllers\resultController@admin_login')->name('admin_logins');
Route::middleware(['auth:sanctum', 'verified'])->get('download_student', 'App\Http\Controllers\resultController@download_students')->name('download_student');
Route::middleware(['auth:sanctum', 'verified'])->post('download_student', 'App\Http\Controllers\resultController@downloadstudents')->name('downloadstudent');
Route::middleware(['auth:sanctum', 'verified'])->get('users/download/{filename}/folder/{path}', 'App\Http\Controllers\resultController@download')->name('download');
Route::middleware(['auth:sanctum', 'verified'])->get('result/download/{filename}/folder/{path}', 'App\Http\Controllers\resultController@downloadresults')->name('downloadresults');
Route::middleware(['auth:sanctum', 'verified'])->get('level', 'App\Http\Controllers\resultController@level')->name('level');
Route::middleware(['auth:sanctum', 'verified'])->get('achievements', 'App\Http\Controllers\resultController@achievements')->name('achievements');
Route::middleware(['auth:sanctum', 'verified'])->get('infrastructure', 'App\Http\Controllers\resultController@infrastructure')->name('infrastructure');



Route::middleware(['auth:sanctum', 'verified'])->put('infrastructure', 'App\Http\Controllers\resultController@infrastructureupdate')->name('infrastructureupdate');

Route::middleware(['auth:sanctum', 'verified'])->put('policies', 'App\Http\Controllers\resultController@policiesupdate')->name('policiesupdate');


Route::middleware(['auth:sanctum', 'verified'])->get('investment', 'App\Http\Controllers\resultController@investment')->name('investment');
Route::middleware(['auth:sanctum', 'verified'])->get('policies', 'App\Http\Controllers\resultController@policies')->name('policies');

Route::middleware(['auth:sanctum', 'verified'])->post('infrastructure', 'App\Http\Controllers\resultController@removeinfra')->name('removeinfra');
Route::middleware(['auth:sanctum', 'verified'])->post('investment', 'App\Http\Controllers\resultController@removeinvest')->name('removeinvest');

Route::middleware(['auth:sanctum', 'verified'])->post('policies', 'App\Http\Controllers\resultController@removepolicies')->name('removepolicies');


Route::middleware(['auth:sanctum', 'verified'])->put('investment', 'App\Http\Controllers\resultController@investmentsupdate')->name('investmentupdate');

Route::middleware(['auth:sanctum', 'verified'])->get('add_infra', 'App\Http\Controllers\resultController@add_infra')->name('add_infra');
Route::middleware(['auth:sanctum', 'verified'])->post('add_infra', 'App\Http\Controllers\resultController@post_infra')->name('add_infra_post');

Route::middleware(['auth:sanctum', 'verified'])->get('add_policies', 'App\Http\Controllers\resultController@add_policies')->name('add_policies');
Route::middleware(['auth:sanctum', 'verified'])->post('add_policies', 'App\Http\Controllers\resultController@post_policies')->name('add_policies_post');



Route::middleware(['auth:sanctum', 'verified'])->get('add_invest', 'App\Http\Controllers\resultController@add_invest')->name('add_invest');
Route::middleware(['auth:sanctum', 'verified'])->post('add_invest', 'App\Http\Controllers\resultController@post_invest')->name('add_invest_post');

Route::middleware(['auth:sanctum', 'verified'])->get('investment/{id}', 'App\Http\Controllers\resultController@edit_invest')->name('edit_invest');
Route::middleware(['auth:sanctum', 'verified'])->put('investment/{id}', 'App\Http\Controllers\resultController@investmentsupdate')->name('investmentupdate');


Route::middleware(['auth:sanctum', 'verified'])->get('infrastructure/{id}', 'App\Http\Controllers\resultController@edit_infra')->name('edit_infra');
Route::middleware(['auth:sanctum', 'verified'])->put('infrastructure/{id}', 'App\Http\Controllers\resultController@infrastructureupdate')->name('infrastructure');



Route::middleware(['auth:sanctum', 'verified'])->post('add_level', 'App\Http\Controllers\resultController@add_level')->name('add_level');
Route::middleware(['auth:sanctum', 'verified'])->get('level/delete/{level}', 'App\Http\Controllers\resultController@level_delete')->name('level.delete');
Route::middleware(['auth:sanctum', 'verified'])->get('process_report', 'App\Http\Controllers\resultController@report_process')->name('report_process');
Route::middleware(['auth:sanctum', 'verified'])->get('project-photos/{id}', 'App\Http\Controllers\resultController@projectphotos')->name('projectphotos');
Route::middleware(['auth:sanctum', 'verified'])->get('investment-photos/{id}', 'App\Http\Controllers\resultController@investmentphotos')->name('investmentphotos');
Route::middleware(['auth:sanctum', 'verified'])->get('special-documents', 'App\Http\Controllers\resultController@specialdocuments')->name('specialdocs');
Route::middleware(['auth:sanctum', 'verified'])->post('special-documents', 'App\Http\Controllers\resultController@specialdocumentspost')->name('specialdocpost');
