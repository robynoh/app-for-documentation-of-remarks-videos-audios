<?php

namespace App\Http\Controllers;

use App\Exports\exportstudentrecord;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelexamrecordsImport;
use App\Imports\resultsupload;
use App\Models\passports;
use Illuminate\Http\Request;
use DB;
use App\models\staffs;
use App\models\programs;
use App\models\speeches;
use App\models\adminusers;
use App\models\total_unit;
use App\models\policies;
use App\models\schools;
use App\models\infrastructure;
use App\models\investments;
use App\models\level;
use App\models\students;
use App\models\departments;
use App\models\school_sessions;
use App\models\courses;
use App\models\grades;
use App\models\account;
use App\Models\tp_process;
use App\Models\grade_point;
use App\Models\unitsandgradeproduct;
use App\Models\total_grade_point;
use App\Models\student_total_point;
use App\Models\studentgpa;
use App\Models\approved_result;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;




class resultController extends Controller
{
    //


    public function students()
    {
       
        return view('students');

    }

    public function biography()
    {
       
        return view('biography');

    }

    public function faq()
    {
       
        return view('faq2');

    }


    public function achievements()
    {
        $infrastructures= DB::table('infrastructures')->get();
        $investments= DB::table('investments')->get();
        $policies= DB::table('policies')->get();
        return view('achievements',['infra'=>$infrastructures,'invest'=>$investments,'policies'=>$policies]);

    }

    public function specialdocuments(){

        $specials= DB::table('special_documents')->get();
        return view('special_documents',['specials'=>$specials]);

        
    }

    public function infrastructure()
    {
        $infrastructures= DB::table('infrastructures')->get();
        $photos= DB::table('infra_photos')->get();
        return view('infrastructures',['infrastructures'=> $infrastructures,'photos'=>$photos]);

    }

    public static function getinfrphotos($id)
    {
        
        $photos= DB::table('infra_photos')->where('infra_id',$id)->get();
        return  $photos->count();

    }

    


    public static function getinvestphotos($id)
    {
        
        $photos= DB::table('invest_photos')->where('invest_id',$id)->get();
        return  $photos->count();

    }


    public static function getimageurls($id){

        $output="";
        $photosx= DB::table('infra_photos')->where('infra_id',$id)->get();
       $photos= DB::table('infra_photos')->where('infra_id',$id)->first();

       if($photosx->count()>0){
       
       

       $output=$photos->img;
       
      
    }

       return $output;
    
    }


    public static function twoInfrastructure()
    {
        $output='';
        $events= DB::table('infrastructures')->paginate(4);
        
        foreach($events as  $event){



            $output.='<div>';
            $output.='<div class="card border-radius-0">';
            $output.='<img class="card-img-top border-radius-0" src="'.resultController::getimageurls($event->id).'" alt="" />';
            $output.='<div class="card-body text-center">';
            $output.='<h4 class="card-title font-weight-extra-bold text-color-dark text-5 mb-1">'.ucfirst(substr(strtolower($event->title),0,50)).'</h4>';
            $output.='<h3 class="text-color-default text-3-5 ls-0 font-weight-normal mb-2 pb-1">'.$event->project_area.'</h3>';
            $output.='<p class="card-text font-weight-light">'.ucfirst(substr(strtolower($event->description),0,50)).'</p>';
            $output.='</div>';
            $output.='</div>';
            $output.=' </div>';





        }
       
return  $output;
    }



    public static function fourEvents()
    {
        $output='';
        $events= DB::table('speech')->where('status',1)->paginate(3);
        foreach($events as  $event){


            $output.='<div class="col-lg-4 mb-4 mb-lg-0">';
            $output.='<article>';
            $output.='<div class="card border-0 border-radius-0">
											<div class="card-body bg-color-light-scale-1 p-4 z-index-1">
												<a href="remark/'.str_replace(' ', '-',strtolower($event->title)).'/'.$event->id.'">';

	 $output.='<img class="card-img-top border-radius-0 hover-effect-2" src="'.$event->caption_photo.'" alt="Card Image">';
     $output.='	</a>';
     $output.='<p class="text-uppercase text-1 mb-3 pt-1 text-color-default">';
     $output.='<time pubdate datetime="2021-01-10">'.\Carbon\Carbon::parse($event->event_time)->diffForHumans().'</time>';
    
     $output.='</p>';
												$output.='<div class="card-body p-0">';
												$output.='	<h4 class="card-title mb-3 text-5 font-weight-semibold"><a class="text-color-dark text-color-hover-primary text-decoration-none font-weight-bold text-3-5" href="remark/'.str_replace(' ', '-',strtolower($event->title)).'/'.$event->id.'">'.ucfirst(substr(strtolower($event->title),0,50)).'</a></h4>';
                                                $output.='<p class="card-text mb-2">'.ucfirst(substr(strtolower($event->content),0,80)).'...</p>';
													
												$output.='	<a href="remark/'.str_replace(' ', '-',strtolower($event->title)).'/'.$event->id.'" class="custom-read-more d-inline-flex align-items-center font-weight-semibold text-3 text-decoration-none pl-0">';
												$output.='		READ MORE +
													</a>
												</div>
											</div>
										</div>
									</article>
								</div>';



        }
       
return  $output;
    }







    public static function latestpost()
    {
        $output='';
        $events= DB::table('speech')
        ->where('status',1)
        ->orderBy('id', 'DESC')
        ->paginate(4);
        foreach($events as  $event){


           $output.='<a href="/remark/'.str_replace(' ', '-',strtolower($event->title)).'/'.$event->id.'" class="text-color-default text-uppercase text-1 mb-0 d-block text-decoration-none">'.\Carbon\Carbon::parse($event->event_time)->diffForHumans().'  </a>';
           $output.='<a href="/remark/'.str_replace(' ', '-',strtolower($event->title)).'/'.$event->id.'" class="text-color-dark text-hover-primary font-weight-bold text-3 d-block pb-3 line-height-4">'.ucfirst(strtolower($event->title)).'</a>';  


        }
       
return  $output;
    }


    public static function latestinfra()
    {
        $output='';
        $events= DB::table('infrastructures')
        ->orderBy('id', 'DESC')
        ->paginate(3);
        foreach($events as  $event){


           $output.='<a href="/infrastructure/'.str_replace(' ', '-',strtolower($event->title)).'/'.$event->id.'" class="text-color-default text-uppercase text-1 mb-0 d-block text-decoration-none">'.\Carbon\Carbon::parse($event->created_at)->diffForHumans().' <span class="opacity-3 d-inline-block px-2">|</span>'.$event->project_area.' </a>';
           $output.='<a href="/infrastructure/'.str_replace(' ', '-',strtolower($event->title)).'/'.$event->id.'" class="text-color-dark text-hover-primary font-weight-bold text-3 d-block pb-3 line-height-4">'.ucfirst(strtolower($event->title)).'</a>';  


        }
       
return  $output;
    }




    public function investment()
    {
        $investments= DB::table('investments')->get();
        $photos= DB::table('invest_photos')->get();
        return view('investment',['investments'=> $investments,'photos'=>$photos]);

    }


    public function socialinvest($val,$id){
       
        $investments=DB::table('investments')
        ->where('id',$id)
        ->first();

        $photo= DB::table('invest_photos')->where('invest_id',$id)->get();

        return view('all_invest_detail',['investment'=> $investments,'photos'=>$photo]);

    }

    public function pagesearch(Request $request){

         $speech= DB::table('speech')
        ->select('speech.id','speech.title','speech.content','speech.event_time','speech.caption_photo','programs.venue')
        ->join('programs','programs.id','=','speech.eventID')
        ->where('speech.status',1)
        ->where('title', 'LIKE', "%{$request->input('search-term')}%") 
        ->orWhere('content', 'LIKE', "%{$request->input('search-term')}%") 
        ->paginate(10);

        $speechcount= DB::table('speech')
        ->select('speech.id','speech.title','speech.content','speech.event_time','speech.caption_photo','programs.venue')
        ->join('programs','programs.id','=','speech.eventID')
        ->where('speech.status',1)
        ->where('title', 'LIKE', "%{$request->input('search-term')}%") 
        ->orWhere('content', 'LIKE', "%{$request->input('search-term')}%") 
        ->get();
        return view('all_speeches',['speeches'=>$speech,'searchcount'=> $speechcount->count()]);

    }



    public function projectsearch(Request $request){

        $project= DB::table('infrastructures')
       ->where('title', 'LIKE', "%{$request->input('search-term')}%") 
       ->where('lga', 'LIKE', "%{$request->input('search-term')}%") 
       ->orWhere('description', 'LIKE', "%{$request->input('search-term')}%") 
       ->paginate(10);

      
       return view('all_physical_dev',['infrastructures'=>$project]);

   }


   public function investsearch(Request $request){

    $project= DB::table('investments')
   ->where('title', 'LIKE', "%{$request->input('search-term')}%") 
   ->where('sector', 'LIKE', "%{$request->input('search-term')}%") 
   ->orWhere('description', 'LIKE', "%{$request->input('search-term')}%") 
   ->paginate(10);

  
   return view('all_investments',['investments'=>$project]);

}


   public function socialinvestment(){
    $investment= DB::table('investments')->get();
    $photo= DB::table('invest_photos')->get();
   
    return view('all_investments',['investments'=>$investment,'photos'=>$photo]);

   }


    public function remarkdetail($title,$id){


     

     $speech= DB::table('speech')
     ->select('speech.id','speech.title','speech.content','speech.event_time','speech.caption_photo','speech.eventID','programs.venue')
     ->join('programs','programs.id','=','speech.eventID')
     ->where('speech.id',$id)
     ->first();
     return view('speech_detail',['speeches'=>$speech]);

    }


    public static function pullaudio($eventID){
$output="";
        $audio= DB::table('audios')->where('eventID',$eventID)->first();

        if(empty($audio->url)){
$output='empty';
        }else{
$output=$audio->url;
        }

        return $output;


    }

    public function oneinfra($val,$id){
       $photo= DB::table('infra_photos')->where('infra_id',$id)->get();
        $infrastructures= DB::table('infrastructures')->where('id',$id)->first();

        return view('physical_dev_detail',['infrastructure'=>$infrastructures,'photos'=>$photo]);

    }

    

    public function allevents()
    {
        //$speech= DB::table('speech')->where('status',1)->get();
      
        $speech= DB::table('speech')
        ->select('speech.id','speech.title','speech.content','speech.event_time','speech.caption_photo','programs.venue')
        ->join('programs','programs.id','=','speech.eventID')
        ->where('speech.status',1)
        ->orderBy('speech.created_at', 'desc')
        ->paginate(10); 
      
        return view('all_speeches',['speeches'=>$speech]);

    }


    public function add_infra()
    {
       
        return view('add_infra');

    }

    
    public function add_policies()
    {
       
        return view('add_policies');

    }

    public function policies()
    {
       

        $policies= DB::table('policies')->get();
        return view('policies',['policies'=> $policies]);
        

    }

    public function add_invest()
    {
       
        return view('add_invest');

    }

    public function admin_login(){
        $userslist= DB::table('users')->get(); 
        return view('admin_login',['users'=> $userslist]);

    }

    public function add_resultsx()
    {
       
        return view('add_results_csv');

    }
    public function course()
    {
       
        $courses= DB::table('courses')
        ->select('courses.course_id','courses.code','courses.title','courses.unit','departments.department','levels.level','semester.semester','school_sessions.session')
        ->join('departments','departments.dept_id','=','courses.dept_id')
        ->join('levels','levels.level_id','=','courses.level_id')
        ->join('semester','semester.semester_id','=','courses.semester_id')
        ->join('school_sessions','school_sessions.session_id','=','courses.session_id')
        ->get(); 

        $levels= DB::table('levels')->get(); 
        $semester= DB::table('semester')->get(); 
        return view('course',['courses'=>$courses,'levels'=>$levels,'semesters'=>$semester]);

    }

    public function users()
    {
       
        $users= DB::table('account')->get(); 
        return view('users',['users'=>$users]);

    }

    public function download_students()
    {
       
       
        return view('download_student');

    }


    public function level()
    {
       
       
        $level= DB::table('levels')->get(); 
        return view('level',['levels'=>$level]);

    }

    public function downloadstudents()
    {
        $session=request()->input('session');
        $department=request()->input('department');
        $level=request()->input('level');
        $school=request()->input('school');
       
        $filename= $sessionname=str_replace("/","-",$this->pullsessionnamevalue($session)).' '.$this->pulllevelname( $level).''.$this->pulldepartmentnamevalue($department);

       return Excel::download(new exportstudentrecord($school,$department,$level,$session),  $filename.' students list.xlsx');

    }

    public function download($file_name,$path) {
        $file_path = public_path($path.'/'.$file_name);
        return response()->download($file_path);
      }


      public function downloadresults($file_name,$path) {
        $file_path = public_path($path.'/'.$file_name);
        return response()->download($file_path);
      }
   
      
    public function grade()
    {
       
        $grades= DB::table('grades')->get(); 
        return view('grades',['grades'=>$grades]);

    }

    public function regenerate()
    {
       
        return view('regenerate');

    }

    public function app_results(){

        return view('app_results');
    }


    public function post_app_results(){

        $validator=$this->validate(request(),[
            'school'=>'required|string',
            'level'=>'required|string',
            'session'=>'required|string',
            'semester'=>'required|string',
          
           
            ],
            [
             ]);

             if(count(request()->all()) > 0){
   $semesterx=request()->input('semester');
   $sessionx=request()->input('session');
   $levelx=request()->input('level');
   $schoolx=request()->input('school');

                $departmentsx= DB::table('departments')
                ->where('school_id',request()->input('school'))
                ->get();
               
               return view('approve_results',['department'=>$departmentsx,'semester'=>$semesterx,'session'=>$sessionx,'level'=>$levelx,'school'=>$schoolx]);

             }
    }

public static function checkifresults($department,$semester,$session,$level){

    $checkCount= DB::table('results')
        ->where('level_id', $level)
        ->where('dept_id', $department)
        ->where('session_id', $session)
        ->where('semester_id', $semester)
        ->get();

      return  $checkCount->count();
   


}


public static function approvestatus($val,$session,$semester,$level,$school){
    $output="";


    $checkCount= DB::table('approved_result')
    ->where('dept_id', $val)
    ->where('session_id', $session)
    ->where('semester_id', $semester)
    ->where('level_id', $level)
    ->where('school_id', $school)
    ->get();

    if($checkCount->count()>0){
        $output='<span style="color:#fff;background:#090;padding:5px;border-radius:5px">Approved</span> <span style="padding-left:30px">' ;
        }else{
        
        $output='<span style="color:#fff;background:#ff0000;padding:5px;border-radius:5px">Pending</span> <span style="padding-left:30px">' ;
        
        }
    return $output;
    }

    public function sheet($dept,$sch,$semester,$session,$level){


        $tpcountgp= DB::table('tp_process')
        ->where('level_id', $level)
        ->where('dept_id', $dept)
        ->where('school_id', $sch)
        ->where('session_id', $session)
        ->where('semester_id', $semester)
        ->where('tpstep', '=', 1)
        ->get();

        $tpcounttgp= DB::table('tp_process')
        ->where('level_id', $level)
        ->where('dept_id', $dept)
        ->where('school_id', $sch)
        ->where('session_id', $session)
        ->where('semester_id', $semester)
        ->where('tpstep', '=', 2)
        ->get();


        $tpcounttupp= DB::table('tp_process')
        ->where('level_id', $level)
        ->where('dept_id', $dept)
        ->where('school_id', $sch)
        ->where('session_id', $session)
        ->where('semester_id', $semester)
        ->where('tpstep', '=', 3)
        ->get();

        $tpcountgpa= DB::table('tp_process')
        ->where('level_id', $level)
        ->where('dept_id', $dept)
        ->where('school_id', $sch)
        ->where('session_id', $session)
        ->where('semester_id', $semester)
        ->where('tpstep', '=', 4)
        ->get();


       
        return view('prep_sheet',['tpcountgp'=>$tpcountgp,'tpcounttgp'=>$tpcounttgp,'tpcounttupp'=>$tpcounttupp,'tpcountgpa'=>$tpcountgpa,'department'=>$dept,'school'=>$sch,'semester'=>$semester,'session'=>$session,'level'=>$level]);

    }



    public function result_approve(Request $request){

        switch ($request->input('action')) {

            case 'approve':

                if(count(request()->all()) >0){

                    if(isset($_POST['depts'])){
                    if (is_array($_POST['depts'])) {
                        foreach($_POST['depts'] as $value){

         $approve= DB::table('approved_result')
        ->where('level_id', request()->input('level'))
        ->where('dept_id',$value)
        ->where('school_id', request()->input('school'))
        ->where('session_id', request()->input('session'))
        ->where('semester_id', request()->input('semester'))
        ->get();

        if($approve->count()<1){


        $approved_result = new approved_result;
        $approved_result->level_id = request()->input('level');
        $approved_result->dept_id= $value;
        $approved_result->school_id = request()->input('school');
        $approved_result->session_id = request()->input('session');
        $approved_result->semester_id =request()->input('semester');
        $approved_result->save();

        }

                        }

                        $departmentsx= DB::table('departments')
                        ->where('school_id',request()->input('school'))
                        ->get();
                       
                       return view('approve_results',['department'=>$departmentsx,'semester'=>request()->input('semester'),'session'=>request()->input('session'),'level'=>request()->input('level'),'school'=>request()->input('school')]);
        

                    }
                }
                    else{
                        $approve= DB::table('approved_result')
                        ->where('level_id', request()->input('level'))
                        ->where('dept_id',$value)
                        ->where('school_id', request()->input('school'))
                        ->where('session_id', request()->input('session'))
                        ->where('semester_id', request()->input('semester'))
                        ->get();
                
                        if($approve->count()<1){
                
                
                        $approved_result = new approved_result;
                        $approved_result->level_id = request()->input('level');
                        $approved_result->dept_id= $_POST['depts'];
                        $approved_result->school_id = request()->input('school');
                        $approved_result->session_id = request()->input('session');
                        $approved_result->semester_id =request()->input('semester');
                        $approved_result->save();
                
                        }
               
                        $departmentsx= DB::table('departments')
                        ->where('school_id',request()->input('school'))
                        ->get();
                       
                       return view('approve_results',['department'=>$departmentsx,'semester'=>request()->input('semester'),'session'=>request()->input('session'),'level'=>request()->input('level'),'school'=>request()->input('school')]);
        
                    }
                }
                else{
                    return redirect()->back()->withErrors('Please check atleast one video to activate');


                }
                
              
               
                break;



            case 'disapprove':

                if(count(request()->all()) >0){
                    if(isset($_POST['depts'])){
                    if (is_array($_POST['depts'])) {

                        foreach($_POST['depts'] as $value){

                            DB::table('approved_result')
                            ->where('level_id', request()->input('level'))
                        ->where('dept_id',$value)
                        ->where('school_id', request()->input('school'))
                        ->where('session_id', request()->input('session'))
                        ->where('semester_id', request()->input('semester'))
                        ->delete();

                        }


                    }else{


                        DB::table('approved_result')
                        ->where('level_id', request()->input('level'))
                        ->where('dept_id',$_POST['depts'])
                        ->where('school_id', request()->input('school'))
                        ->where('session_id', request()->input('session'))
                        ->where('semester_id', request()->input('semester'))
                        ->delete();

                    }


                }

                $departmentsx= DB::table('departments')
                ->where('school_id',request()->input('school'))
                ->get();
               
               return view('approve_results',['department'=>$departmentsx,'semester'=>request()->input('semester'),'session'=>request()->input('session'),'level'=>request()->input('level'),'school'=>request()->input('school')]);


            }

                break;

        }


    }

    public function list_of_approve(){

        if(count(request()->all()) >0){

            if(isset($_POST['depts'])){
            if (is_array($_POST['depts'])) {
                foreach($_POST['depts'] as $value){

                    DB::table('approved_result')
                    ->where('level_id', request()->input('level'))
                ->where('dept_id',$value)
                ->where('school_id', request()->input('school'))
                ->where('session_id', request()->input('session'))
                ->where('semester_id', request()->input('semester'))
                ->delete();

                  }
            
                  return redirect()->back()->withSuccess('department results disapproved successfuly.');   
            
            
            }
                else{


                    DB::table('approved_result')
                    ->where('level_id', request()->input('level'))
                ->where('dept_id',$_POST['depts'])
                ->where('school_id', request()->input('school'))
                ->where('session_id', request()->input('session'))
                ->where('semester_id', request()->input('semester'))
                ->delete();
                return redirect()->back()->withSuccess('department results disapproved successfuly.');

                }
            
            }
            else{


                return redirect()->back()->withErrors('Please check atleast one department to activate');
            }
        
        
        
        
        
        }



    }
    
   public function list_of_approve_results(){

    $allresults= DB::table('approved_result')
    ->select('departments.department','departments.dept_id','levels.level','levels.level_id','schools.school','schools.school_id','semester.semester','semester.semester_id','school_sessions.session','school_sessions.session_id')
    ->join('departments','departments.dept_id','=','approved_result.dept_id')
    ->join('schools','schools.school_id','=','approved_result.school_id')
    ->join('levels','levels.level_id','=','approved_result.level_id')
    ->join('semester','semester.semester_id','=','approved_result.semester_id')
    ->join('school_sessions','school_sessions.session_id','=','approved_result.session_id')
    ->get();
   return view('list_of_approved_result',['results'=>$allresults]);


   }


    public function parameterProcess(Request $request){
        switch ($request->input('action')) {
            case 'gp':





                $examRecords= DB::table('exam_records')
                ->where('school_id', request()->input('school'))
                ->where('level_id', request()->input('level'))
                ->where('dept_id', request()->input('department'))
                ->where('session_id', request()->input('session'))
                ->orderBy('student_id')
                ->chunk(50, function($records){
            
            foreach($records as $record){
            
                $results= DB::table('results')
                ->where('school_id', request()->input('school'))
                ->where('level_id', request()->input('level'))
                ->where('dept_id', request()->input('department'))
                ->where('session_id', request()->input('session'))
                ->where('exam_no', $record->exam_no)
                ->where('semester_id', request()->input('semester'))
                ->get(); 
               if($results->count()>0){

              //$gradepoint=$this->computegradePoint($record->exam_no,request()->input('semester'),request()->input('level'),request()->input('session'),request()->input('school'),request()->input('department'))	;
              $exam_no=$record->exam_no;
              $semester=request()->input('semester');
              $level=request()->input('level');
              $session=request()->input('session');
              $school=request()->input('school');
              $department=request()->input('department');

              $coursecount=$this->numberOfCourse($semester,$level,$session,$school,$department);

              $results= DB::table('results')
              ->where('exam_no',$exam_no)
              ->where('level_id',$level)
              ->where('dept_id',$department)
              ->where('session_id',$session)
              ->where('semester_id',$semester)
              ->get();
              
             // $gquery="SELECT scores,code from results where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
             // $gresults=$this->retrieve($gquery);
             // $grows=$this->arrayFetch($gresults);
              
              
              foreach($results as $grow){
          
                     
              if(is_numeric($grow->scores)){
                  
                  
              if($grow->scores >= $this->gradepoints(1)){
      
      
                  $gradecnt= DB::table('grade_point')
                  ->where('exam_no',$exam_no)
                  ->where('level_id',$level)
                  ->where('dept_id',$department)
                  ->where('session_id',$session)
                  ->where('semester_id',$semester)
                  ->get();
                  
                  
                  //$chq="SELECT * from grade_point where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
                  //$chqresults=$this->retrieve($chq);
                  //$num=$this->numRows($chqresults);
      
      
                  if($gradecnt->count()<$coursecount){
      
                      $grade_point = new grade_point();
                      $grade_point->exam_no=$exam_no;
                      $grade_point->gpoint=$this->gradeweight(1);
                      $grade_point->unit=$this->getcourseunit($grow->code,$department,$semester,$session,$level);
                      $grade_point->level_id=$level;
                      $grade_point->semester_id=$semester;
                      $grade_point->school_id=$school;
                      $grade_point->dept_id=$department;
                      $grade_point->session_id=$session;
                      $grade_point->save();
      
                  
              //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$this->gradeweight(1)."','".$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
              //$this->insertion($sqlx);
      
              $unitsandgrade= DB::table('unitsandgradeproduct')
              ->where('exam_no',$exam_no)
              ->where('level_id',$level)
              ->where('dept_id',$department)
              ->where('session_id',$session)
              ->where('semester_id',$semester)
              ->where('school_id',$school)
              ->where('course_code_unit',$grow->code)
              ->get();
      
              
              //$chkquerys="SELECT * FROM unitsandgradeproduct WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' and school='".$school."' and course_code_unit='".$grow['code']."'";
              //$chkresults=$this->retrieve($chkquerys);
              //$chknum=$this->numRows($chkresults);
              if($unitsandgrade->count()<1){	
              
             // $sqlp ="INSERT INTO unitsandgradeproduct(exam_no,course_code_unit,product,level,semester,school,department,session ) VALUES ('".$exam_no."','".$grow['code']."','".$this->gradeweight(1)*$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
             // $this->insertion($sqlp);
      
              $unitsandgradeproduct = new unitsandgradeproduct();
              $unitsandgradeproduct->exam_no=$exam_no;
              $unitsandgradeproduct->course_code_unit=$grow->code;
              $unitsandgradeproduct->product=$this->gradeweight(1)*$this->getcourseunit($grow->code,$department,$semester,$session,$level);
              $unitsandgradeproduct->level_id=$level;
              $unitsandgradeproduct->semester_id=$semester;
              $unitsandgradeproduct->school_id=$school;
              $unitsandgradeproduct->dept_id=$department;
              $unitsandgradeproduct->session_id=$session;
              $unitsandgradeproduct->save();
      
      
      
              }
              
                  }	
              }
              else if($grow->scores >= $this->gradepoints(2)){
              
                  $gradecnt= DB::table('grade_point')
                  ->where('exam_no',$exam_no)
                  ->where('level_id',$level)
                  ->where('dept_id',$department)
                  ->where('session_id',$session)
                  ->where('semester_id',$semester)
                  ->get();
                  
                  
                  //$chq="SELECT * from grade_point where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
                  //$chqresults=$this->retrieve($chq);
                  //$num=$this->numRows($chqresults);
      
      
                  if($gradecnt->count()<$coursecount){
      
                      $grade_point = new grade_point();
                      $grade_point->exam_no=$exam_no;
                      $grade_point->gpoint=$this->gradeweight(2);
                      $grade_point->unit=$this->getcourseunit($grow->code,$department,$semester,$session,$level);
                      $grade_point->level_id=$level;
                      $grade_point->semester_id=$semester;
                      $grade_point->school_id=$school;
                      $grade_point->dept_id=$department;
                      $grade_point->session_id=$session;
                      $grade_point->save();
      
                  
              //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$this->gradeweight(1)."','".$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
              //$this->insertion($sqlx);
      
              $unitsandgrade= DB::table('unitsandgradeproduct')
              ->where('exam_no',$exam_no)
              ->where('level_id',$level)
              ->where('dept_id',$department)
              ->where('session_id',$session)
              ->where('semester_id',$semester)
              ->where('school_id',$school)
              ->where('course_code_unit',$grow->code)
              ->get();
      
              
              //$chkquerys="SELECT * FROM unitsandgradeproduct WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' and school='".$school."' and course_code_unit='".$grow['code']."'";
              //$chkresults=$this->retrieve($chkquerys);
              //$chknum=$this->numRows($chkresults);
              if($unitsandgrade->count()<1){	
              
             // $sqlp ="INSERT INTO unitsandgradeproduct(exam_no,course_code_unit,product,level,semester,school,department,session ) VALUES ('".$exam_no."','".$grow['code']."','".$this->gradeweight(1)*$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
             // $this->insertion($sqlp);
      
              $unitsandgradeproduct = new unitsandgradeproduct();
              $unitsandgradeproduct->exam_no=$exam_no;
              $unitsandgradeproduct->course_code_unit=$grow->code;
              $unitsandgradeproduct->product=$this->gradeweight(2)*$this->getcourseunit($grow->code,$department,$semester,$session,$level);
              $unitsandgradeproduct->level_id=$level;
              $unitsandgradeproduct->semester_id=$semester;
              $unitsandgradeproduct->school_id=$school;
              $unitsandgradeproduct->dept_id=$department;
              $unitsandgradeproduct->session_id=$session;
              $unitsandgradeproduct->save();
      
      
      
              }
              
                  }	
              }
              
              else if($grow->scores >= $this->gradepoints(3)){
                  $gradecnt= DB::table('grade_point')
                  ->where('exam_no',$exam_no)
                  ->where('level_id',$level)
                  ->where('dept_id',$department)
                  ->where('session_id',$session)
                  ->where('semester_id',$semester)
                  ->get();
                  
                  
                  //$chq="SELECT * from grade_point where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
                  //$chqresults=$this->retrieve($chq);
                  //$num=$this->numRows($chqresults);
      
      
                  if($gradecnt->count()<$coursecount){
      
                      $grade_point = new grade_point();
                      $grade_point->exam_no=$exam_no;
                      $grade_point->gpoint=$this->gradeweight(3);
                      $grade_point->unit=$this->getcourseunit($grow->code,$department,$semester,$session,$level);
                      $grade_point->level_id=$level;
                      $grade_point->semester_id=$semester;
                      $grade_point->school_id=$school;
                      $grade_point->dept_id=$department;
                      $grade_point->session_id=$session;
                      $grade_point->save();
      
                  
              //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$this->gradeweight(1)."','".$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
              //$this->insertion($sqlx);
      
              $unitsandgrade= DB::table('unitsandgradeproduct')
              ->where('exam_no',$exam_no)
              ->where('level_id',$level)
              ->where('dept_id',$department)
              ->where('session_id',$session)
              ->where('semester_id',$semester)
              ->where('school_id',$school)
              ->where('course_code_unit',$grow->code)
              ->get();
      
              
              //$chkquerys="SELECT * FROM unitsandgradeproduct WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' and school='".$school."' and course_code_unit='".$grow['code']."'";
              //$chkresults=$this->retrieve($chkquerys);
              //$chknum=$this->numRows($chkresults);
              if($unitsandgrade->count()<1){	
              
             // $sqlp ="INSERT INTO unitsandgradeproduct(exam_no,course_code_unit,product,level,semester,school,department,session ) VALUES ('".$exam_no."','".$grow['code']."','".$this->gradeweight(1)*$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
             // $this->insertion($sqlp);
      
              $unitsandgradeproduct = new unitsandgradeproduct();
              $unitsandgradeproduct->exam_no=$exam_no;
              $unitsandgradeproduct->course_code_unit=$grow->code;
              $unitsandgradeproduct->product=$this->gradeweight(3)*$this->getcourseunit($grow->code,$department,$semester,$session,$level);
              $unitsandgradeproduct->level_id=$level;
              $unitsandgradeproduct->semester_id=$semester;
              $unitsandgradeproduct->school_id=$school;
              $unitsandgradeproduct->dept_id=$department;
              $unitsandgradeproduct->session_id=$session;
              $unitsandgradeproduct->save();
      
      
      
              }
              
                  }
              }
              else if($grow->scores >= $this->gradepoints(4)){
              
                  $gradecnt= DB::table('grade_point')
                  ->where('exam_no',$exam_no)
                  ->where('level_id',$level)
                  ->where('dept_id',$department)
                  ->where('session_id',$session)
                  ->where('semester_id',$semester)
                  ->get();
                  
                  
                  //$chq="SELECT * from grade_point where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
                  //$chqresults=$this->retrieve($chq);
                  //$num=$this->numRows($chqresults);
      
      
                  if($gradecnt->count()<$coursecount){
      
                      $grade_point = new grade_point();
                      $grade_point->exam_no=$exam_no;
                      $grade_point->gpoint=$this->gradeweight(4);
                      $grade_point->unit=$this->getcourseunit($grow->code,$department,$semester,$session,$level);
                      $grade_point->level_id=$level;
                      $grade_point->semester_id=$semester;
                      $grade_point->school_id=$school;
                      $grade_point->dept_id=$department;
                      $grade_point->session_id=$session;
                      $grade_point->save();
      
                  
              //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$this->gradeweight(1)."','".$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
              //$this->insertion($sqlx);
      
              $unitsandgrade= DB::table('unitsandgradeproduct')
              ->where('exam_no',$exam_no)
              ->where('level_id',$level)
              ->where('dept_id',$department)
              ->where('session_id',$session)
              ->where('semester_id',$semester)
              ->where('school_id',$school)
              ->where('course_code_unit',$grow->code)
              ->get();
      
              
              //$chkquerys="SELECT * FROM unitsandgradeproduct WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' and school='".$school."' and course_code_unit='".$grow['code']."'";
              //$chkresults=$this->retrieve($chkquerys);
              //$chknum=$this->numRows($chkresults);
              if($unitsandgrade->count()<1){	
              
             // $sqlp ="INSERT INTO unitsandgradeproduct(exam_no,course_code_unit,product,level,semester,school,department,session ) VALUES ('".$exam_no."','".$grow['code']."','".$this->gradeweight(1)*$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
             // $this->insertion($sqlp);
      
              $unitsandgradeproduct = new unitsandgradeproduct();
              $unitsandgradeproduct->exam_no=$exam_no;
              $unitsandgradeproduct->course_code_unit=$grow->code;
              $unitsandgradeproduct->product=$this->gradeweight(4)*$this->getcourseunit($grow->code,$department,$semester,$session,$level);
              $unitsandgradeproduct->level_id=$level;
              $unitsandgradeproduct->semester_id=$semester;
              $unitsandgradeproduct->school_id=$school;
              $unitsandgradeproduct->dept_id=$department;
              $unitsandgradeproduct->session_id=$session;
              $unitsandgradeproduct->save();
      
      
      
              }
              
                  }
              }
              
              else if($grow->scores >= $this->gradepoints(5)){
                  
                  $gradecnt= DB::table('grade_point')
                  ->where('exam_no',$exam_no)
                  ->where('level_id',$level)
                  ->where('dept_id',$department)
                  ->where('session_id',$session)
                  ->where('semester_id',$semester)
                  ->get();
                  
                  
                  //$chq="SELECT * from grade_point where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
                  //$chqresults=$this->retrieve($chq);
                  //$num=$this->numRows($chqresults);
      
      
                  if($gradecnt->count()<$coursecount){
      
                      $grade_point = new grade_point();
                      $grade_point->exam_no=$exam_no;
                      $grade_point->gpoint=$this->gradeweight(5);
                      $grade_point->unit=$this->getcourseunit($grow->code,$department,$semester,$session,$level);
                      $grade_point->level_id=$level;
                      $grade_point->semester_id=$semester;
                      $grade_point->school_id=$school;
                      $grade_point->dept_id=$department;
                      $grade_point->session_id=$session;
                      $grade_point->save();
      
                  
              //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$this->gradeweight(1)."','".$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
              //$this->insertion($sqlx);
      
              $unitsandgrade= DB::table('unitsandgradeproduct')
              ->where('exam_no',$exam_no)
              ->where('level_id',$level)
              ->where('dept_id',$department)
              ->where('session_id',$session)
              ->where('semester_id',$semester)
              ->where('school_id',$school)
              ->where('course_code_unit',$grow->code)
              ->get();
      
              
              //$chkquerys="SELECT * FROM unitsandgradeproduct WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' and school='".$school."' and course_code_unit='".$grow['code']."'";
              //$chkresults=$this->retrieve($chkquerys);
              //$chknum=$this->numRows($chkresults);
              if($unitsandgrade->count()<1){	
              
             // $sqlp ="INSERT INTO unitsandgradeproduct(exam_no,course_code_unit,product,level,semester,school,department,session ) VALUES ('".$exam_no."','".$grow['code']."','".$this->gradeweight(1)*$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
             // $this->insertion($sqlp);
      
              $unitsandgradeproduct = new unitsandgradeproduct();
              $unitsandgradeproduct->exam_no=$exam_no;
              $unitsandgradeproduct->course_code_unit=$grow->code;
              $unitsandgradeproduct->product=$this->gradeweight(5)*$this->getcourseunit($grow->code,$department,$semester,$session,$level);
              $unitsandgradeproduct->level_id=$level;
              $unitsandgradeproduct->semester_id=$semester;
              $unitsandgradeproduct->school_id=$school;
              $unitsandgradeproduct->dept_id=$department;
              $unitsandgradeproduct->session_id=$session;
              $unitsandgradeproduct->save();
      
      
      
              }
              
                  }
              }
              
              else if($grow->scores >= $this->gradepoints(6)){
                  
                  $gradecnt= DB::table('grade_point')
                  ->where('exam_no',$exam_no)
                  ->where('level_id',$level)
                  ->where('dept_id',$department)
                  ->where('session_id',$session)
                  ->where('semester_id',$semester)
                  ->get();
                  
                  
                  //$chq="SELECT * from grade_point where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
                  //$chqresults=$this->retrieve($chq);
                  //$num=$this->numRows($chqresults);
      
      
                  if($gradecnt->count()<$coursecount){
      
                      $grade_point = new grade_point();
                      $grade_point->exam_no=$exam_no;
                      $grade_point->gpoint=$this->gradeweight(6);
                      $grade_point->unit=$this->getcourseunit($grow->code,$department,$semester,$session,$level);
                      $grade_point->level_id=$level;
                      $grade_point->semester_id=$semester;
                      $grade_point->school_id=$school;
                      $grade_point->dept_id=$department;
                      $grade_point->session_id=$session;
                      $grade_point->save();
      
                  
              //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$this->gradeweight(1)."','".$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
              //$this->insertion($sqlx);
      
              $unitsandgrade= DB::table('unitsandgradeproduct')
              ->where('exam_no',$exam_no)
              ->where('level_id',$level)
              ->where('dept_id',$department)
              ->where('session_id',$session)
              ->where('semester_id',$semester)
              ->where('school_id',$school)
              ->where('course_code_unit',$grow->code)
              ->get();
      
              
              //$chkquerys="SELECT * FROM unitsandgradeproduct WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' and school='".$school."' and course_code_unit='".$grow['code']."'";
              //$chkresults=$this->retrieve($chkquerys);
              //$chknum=$this->numRows($chkresults);
              if($unitsandgrade->count()<1){	
              
             // $sqlp ="INSERT INTO unitsandgradeproduct(exam_no,course_code_unit,product,level,semester,school,department,session ) VALUES ('".$exam_no."','".$grow['code']."','".$this->gradeweight(1)*$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
             // $this->insertion($sqlp);
      
              $unitsandgradeproduct = new unitsandgradeproduct();
              $unitsandgradeproduct->exam_no=$exam_no;
              $unitsandgradeproduct->course_code_unit=$grow->code;
              $unitsandgradeproduct->product=$this->gradeweight(6)*$this->getcourseunit($grow->code,$department,$semester,$session,$level);
              $unitsandgradeproduct->level_id=$level;
              $unitsandgradeproduct->semester_id=$semester;
              $unitsandgradeproduct->school_id=$school;
              $unitsandgradeproduct->dept_id=$department;
              $unitsandgradeproduct->session_id=$session;
              $unitsandgradeproduct->save();
      
      
      
              }
              
                  }
                  
              }
              else if($grow->scores >= $this->gradepoints(7)){
                  
                  $gradecnt= DB::table('grade_point')
                  ->where('exam_no',$exam_no)
                  ->where('level_id',$level)
                  ->where('dept_id',$department)
                  ->where('session_id',$session)
                  ->where('semester_id',$semester)
                  ->get();
                  
                  
                  //$chq="SELECT * from grade_point where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
                  //$chqresults=$this->retrieve($chq);
                  //$num=$this->numRows($chqresults);
      
      
                  if($gradecnt->count()<$coursecount){
      
                      $grade_point = new grade_point();
                      $grade_point->exam_no=$exam_no;
                      $grade_point->gpoint=$this->gradeweight(7);
                      $grade_point->unit=$this->getcourseunit($grow->code,$department,$semester,$session,$level);
                      $grade_point->level_id=$level;
                      $grade_point->semester_id=$semester;
                      $grade_point->school_id=$school;
                      $grade_point->dept_id=$department;
                      $grade_point->session_id=$session;
                      $grade_point->save();
      
                  
              //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$this->gradeweight(1)."','".$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
              //$this->insertion($sqlx);
      
              $unitsandgrade= DB::table('unitsandgradeproduct')
              ->where('exam_no',$exam_no)
              ->where('level_id',$level)
              ->where('dept_id',$department)
              ->where('session_id',$session)
              ->where('semester_id',$semester)
              ->where('school_id',$school)
              ->where('course_code_unit',$grow->code)
              ->get();
      
              
              //$chkquerys="SELECT * FROM unitsandgradeproduct WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' and school='".$school."' and course_code_unit='".$grow['code']."'";
              //$chkresults=$this->retrieve($chkquerys);
              //$chknum=$this->numRows($chkresults);
              if($unitsandgrade->count()<1){	
              
             // $sqlp ="INSERT INTO unitsandgradeproduct(exam_no,course_code_unit,product,level,semester,school,department,session ) VALUES ('".$exam_no."','".$grow['code']."','".$this->gradeweight(1)*$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
             // $this->insertion($sqlp);
      
              $unitsandgradeproduct = new unitsandgradeproduct();
              $unitsandgradeproduct->exam_no=$exam_no;
              $unitsandgradeproduct->course_code_unit=$grow->code;
              $unitsandgradeproduct->product=$this->gradeweight(7)*$this->getcourseunit($grow->code,$department,$semester,$session,$level);
              $unitsandgradeproduct->level_id=$level;
              $unitsandgradeproduct->semester_id=$semester;
              $unitsandgradeproduct->school_id=$school;
              $unitsandgradeproduct->dept_id=$department;
              $unitsandgradeproduct->session_id=$session;
              $unitsandgradeproduct->save();
      
      
      
              }
              
                  }
                  
              }
              else if($grow->scores >= $this->gradepoints(8)){
                  
                  $gradecnt= DB::table('grade_point')
                  ->where('exam_no',$exam_no)
                  ->where('level_id',$level)
                  ->where('dept_id',$department)
                  ->where('session_id',$session)
                  ->where('semester_id',$semester)
                  ->get();
                  
                  
                  //$chq="SELECT * from grade_point where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
                  //$chqresults=$this->retrieve($chq);
                  //$num=$this->numRows($chqresults);
      
      
                  if($gradecnt->count()<$coursecount){
      
                      $grade_point = new grade_point();
                      $grade_point->exam_no=$exam_no;
                      $grade_point->gpoint=$this->gradeweight(8);
                      $grade_point->unit=$this->getcourseunit($grow->code,$department,$semester,$session,$level);
                      $grade_point->level_id=$level;
                      $grade_point->semester_id=$semester;
                      $grade_point->school_id=$school;
                      $grade_point->dept_id=$department;
                      $grade_point->session_id=$session;
                      $grade_point->save();
      
                  
              //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$this->gradeweight(1)."','".$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
              //$this->insertion($sqlx);
      
              $unitsandgrade= DB::table('unitsandgradeproduct')
              ->where('exam_no',$exam_no)
              ->where('level_id',$level)
              ->where('dept_id',$department)
              ->where('session_id',$session)
              ->where('semester_id',$semester)
              ->where('school_id',$school)
              ->where('course_code_unit',$grow->code)
              ->get();
      
              
              //$chkquerys="SELECT * FROM unitsandgradeproduct WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' and school='".$school."' and course_code_unit='".$grow['code']."'";
              //$chkresults=$this->retrieve($chkquerys);
              //$chknum=$this->numRows($chkresults);
              if($unitsandgrade->count()<1){	
              
             // $sqlp ="INSERT INTO unitsandgradeproduct(exam_no,course_code_unit,product,level,semester,school,department,session ) VALUES ('".$exam_no."','".$grow['code']."','".$this->gradeweight(1)*$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
             // $this->insertion($sqlp);
      
              $unitsandgradeproduct = new unitsandgradeproduct();
              $unitsandgradeproduct->exam_no=$exam_no;
              $unitsandgradeproduct->course_code_unit=$grow->code;
              $unitsandgradeproduct->product=$this->gradeweight(8)*$this->getcourseunit($grow->code,$department,$semester,$session,$level);
              $unitsandgradeproduct->level_id=$level;
              $unitsandgradeproduct->semester_id=$semester;
              $unitsandgradeproduct->school_id=$school;
              $unitsandgradeproduct->dept_id=$department;
              $unitsandgradeproduct->session_id=$session;
              $unitsandgradeproduct->save();
      
      
      
              }
              
                  }
                  
              }
              else if($grow->scores >= $this->gradepoints(9)){
              
                  $gradecnt= DB::table('grade_point')
                  ->where('exam_no',$exam_no)
                  ->where('level_id',$level)
                  ->where('dept_id',$department)
                  ->where('session_id',$session)
                  ->where('semester_id',$semester)
                  ->get();
                  
                  
                  //$chq="SELECT * from grade_point where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
                  //$chqresults=$this->retrieve($chq);
                  //$num=$this->numRows($chqresults);
      
      
                  if($gradecnt->count()<$coursecount){
      
                      $grade_point = new grade_point();
                      $grade_point->exam_no=$exam_no;
                      $grade_point->gpoint=$this->gradeweight(9);
                      $grade_point->unit=$this->getcourseunit($grow->code,$department,$semester,$session,$level);
                      $grade_point->level_id=$level;
                      $grade_point->semester_id=$semester;
                      $grade_point->school_id=$school;
                      $grade_point->dept_id=$department;
                      $grade_point->session_id=$session;
                      $grade_point->save();
      
                  
              //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$this->gradeweight(1)."','".$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
              //$this->insertion($sqlx);
      
              $unitsandgrade= DB::table('unitsandgradeproduct')
              ->where('exam_no',$exam_no)
              ->where('level_id',$level)
              ->where('dept_id',$department)
              ->where('session_id',$session)
              ->where('semester_id',$semester)
              ->where('school_id',$school)
              ->where('course_code_unit',$grow->code)
              ->get();
      
              
              //$chkquerys="SELECT * FROM unitsandgradeproduct WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' and school='".$school."' and course_code_unit='".$grow['code']."'";
              //$chkresults=$this->retrieve($chkquerys);
              //$chknum=$this->numRows($chkresults);
              if($unitsandgrade->count()<1){	
              
             // $sqlp ="INSERT INTO unitsandgradeproduct(exam_no,course_code_unit,product,level,semester,school,department,session ) VALUES ('".$exam_no."','".$grow['code']."','".$this->gradeweight(1)*$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
             // $this->insertion($sqlp);
      
              $unitsandgradeproduct = new unitsandgradeproduct();
              $unitsandgradeproduct->exam_no=$exam_no;
              $unitsandgradeproduct->course_code_unit=$grow->code;
              $unitsandgradeproduct->product=$this->gradeweight(9)*$this->getcourseunit($grow->code,$department,$semester,$session,$level);
              $unitsandgradeproduct->level_id=$level;
              $unitsandgradeproduct->semester_id=$semester;
              $unitsandgradeproduct->school_id=$school;
              $unitsandgradeproduct->dept_id=$department;
              $unitsandgradeproduct->session_id=$session;
              $unitsandgradeproduct->save();
      
      
      
              }
              
                  }
              
              }		
              }else{
                  
              //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,level,semester,school,department,session ) VALUES ('".$exam_no."','0','".$level."','".$semester."','".$school."','".$department."','".$session."')";
              //$this->insertion($sqlx);
              }
                  
              }


            
        
            }
            
            
            
                    }
            
                 });



        $logcnt= DB::table('tp_process')
        ->where('level_id', request()->input('level'))
        ->where('dept_id',request()->input('department'))
        ->where('school_id', request()->input('school'))
        ->where('session_id', request()->input('session'))
        ->where('semester_id', request()->input('semester'))
        ->where('tpstep', '=', 1)
        ->get();


       if($logcnt->count()<1){

                 $tp_process = new tp_process();
                 $tp_process->session_id=request()->input('session');
                 $tp_process->dept_id=request()->input('department');
                 $tp_process->school_id=request()->input('school');
                 $tp_process->semester_id=request()->input('semester');
                 $tp_process->level_id=request()->input('level');
                 $tp_process->tpstep=1;
                 $tp_process->save();

                 }

          return redirect()->back();
               
                break;
    
            case 'tgp':

                $examRecords= DB::table('exam_records')
                ->where('school_id', request()->input('school'))
                ->where('level_id', request()->input('level'))
                ->where('dept_id', request()->input('department'))
                ->where('session_id', request()->input('session'))
                ->orderBy('student_id')
                ->chunk(50, function($records){
            
            foreach($records as $record){
            
                $results= DB::table('results')
                ->where('school_id', request()->input('school'))
                ->where('level_id', request()->input('level'))
                ->where('dept_id', request()->input('department'))
                ->where('session_id', request()->input('session'))
                ->where('exam_no', $record->exam_no)
                ->where('semester_id', request()->input('semester'))
                ->get(); 

               if($results->count()>0){

               ////////////////////////// select total student gradepoint ///////////////////////////////////////
                $gradepoint=$this->totalgradepoint( $record->exam_no,request()->input('semester'),request()->input('level'),request()->input('session'),request()->input('school'),request()->input('department'));
	
            
        
            }
            
            
            
                    }
            
                 });



        $logcnt= DB::table('tp_process')
        ->where('level_id', request()->input('level'))
        ->where('dept_id',request()->input('department'))
        ->where('school_id', request()->input('school'))
        ->where('session_id', request()->input('session'))
        ->where('semester_id', request()->input('semester'))
        ->where('tpstep', '=', 2)
        ->get();


       if($logcnt->count()<1){

                 $tp_process = new tp_process();
                 $tp_process->session_id=request()->input('session');
                 $tp_process->dept_id=request()->input('department');
                 $tp_process->school_id=request()->input('school');
                 $tp_process->semester_id=request()->input('semester');
                 $tp_process->level_id=request()->input('level');
                 $tp_process->tpstep=2;
                 $tp_process->save();

                 }

                
               
    
                return redirect()->back();
                break;



                case 'ugpp':
                
               
                    $examRecords= DB::table('exam_records')
                    ->where('school_id', request()->input('school'))
                    ->where('level_id', request()->input('level'))
                    ->where('dept_id', request()->input('department'))
                    ->where('session_id', request()->input('session'))
                    ->orderBy('student_id')
                    ->chunk(50, function($records){
                
                foreach($records as $record){
                
                    $results= DB::table('results')
                    ->where('school_id', request()->input('school'))
                    ->where('level_id', request()->input('level'))
                    ->where('dept_id', request()->input('department'))
                    ->where('session_id', request()->input('session'))
                    ->where('exam_no', $record->exam_no)
                    ->where('semester_id', request()->input('semester'))
                    ->get(); 
    
                   if($results->count()>0){
    
                  	
		
		////////////////////// compute the product of units and grade point ////////////////////////////////////
	
        //$gradepoint=$this->unitsandgradepointproduct($row['exam_no'],$_GET['semester'],$_GET['level'],$_GET['session'],$_GET['school'],$_GET['department']);
	
	
	//////////////////////////////////////////////// store the total points of the student ///////////////////////////////////////
	//$sql="SELECT SUM(product) as totproduct FROM `unitsandgradeproduct` WHERE  exam_no='".$row['exam_no']."' and semester='".$_GET['semester']."' and level='".$_GET['level']."' and session='".$_GET['session']."' and department='".$_GET['department']."' and school='".$_GET['school']."'";
	//$result=$connect->retrieve($sql);
	//$rowstu=$connect->arrayFetch($result);

    $ugps= DB::table('unitsandgradeproduct')->select(DB::raw('SUM(product) as totproduct'))
    ->where('exam_no', $record->exam_no)
    ->where('semester_id', request()->input('semester'))
    ->where('level_id', request()->input('level'))
	->where('session_id', request()->input('session'))
    ->where('dept_id', request()->input('department'))
    ->get();


	foreach($ugps as $rowtu){

	 $chknum= DB::table('student_total_point')
    ->where('exam_no', $record->exam_no)
    ->where('semester_id', request()->input('semester'))
    ->where('level_id', request()->input('level'))
    ->where('session_id', request()->input('session'))
    ->where('school_id', request()->input('school'))
    ->where('dept_id', request()->input('department'))
    ->get(); 


	if($chknum->count()<1){	
	$product=round(($rowtu->totproduct),1);

    $student_total_point = new student_total_point();
    $student_total_point->exam_no=$record->exam_no;
    $student_total_point->studenttotalgpoint=$product;
    $student_total_point->level_id=request()->input('level');
    $student_total_point->semester_id=request()->input('semester');
    $student_total_point->school_id=request()->input('school');
    $student_total_point->dept_id=request()->input('department');
    $student_total_point->session_id=request()->input('session');
    $student_total_point->save();
	
	//$sqltp ="INSERT INTO student_total_point (id,exam_no,studenttotalgpoint,level,semester,school,department,session ) VALUES (NULL,'".$row['exam_no']."','".$product."','".$_GET['level']."','".$_GET['semester']."','".$_GET['school']."','".$_GET['department']."','".$_GET['session']."')";
    //$connect->insertion($sqltp);
	
	
	}
		
	}
                
            
                }
                
                
                
                        }
                
                     });
    
    
    
            $logcnt= DB::table('tp_process')
            ->where('level_id', request()->input('level'))
            ->where('dept_id',request()->input('department'))
            ->where('school_id', request()->input('school'))
            ->where('session_id', request()->input('session'))
            ->where('semester_id', request()->input('semester'))
            ->where('tpstep', '=', 3)
            ->get();
    
    
           if($logcnt->count()<1){
    
                     $tp_process = new tp_process();
                     $tp_process->session_id=request()->input('session');
                     $tp_process->dept_id=request()->input('department');
                     $tp_process->school_id=request()->input('school');
                     $tp_process->semester_id=request()->input('semester');
                     $tp_process->level_id=request()->input('level');
                     $tp_process->tpstep=3;
                     $tp_process->save();
    
                     }
        
                    return redirect()->back();
                   
        
        
                    break;


                    case 'gpa':



                $examRecords= DB::table('exam_records')
                ->where('school_id', request()->input('school'))
                ->where('level_id', request()->input('level'))
                ->where('dept_id', request()->input('department'))
                ->where('session_id', request()->input('session'))
                ->orderBy('student_id')
                ->chunk(50, function($records){
            
            foreach($records as $record){
            
                $results= DB::table('results')
                ->where('school_id', request()->input('school'))
                ->where('level_id', request()->input('level'))
                ->where('dept_id', request()->input('department'))
                ->where('session_id', request()->input('session'))
                ->where('exam_no', $record->exam_no)
                ->where('semester_id', request()->input('semester'))
                ->get(); 

               if($results->count()>0){

               ////////////////////////// select total student gradepoint ///////////////////////////////////////
                $GPA=$this->studentgpa($record->exam_no,request()->input('semester'),request()->input('level'),request()->input('session'),request()->input('school'),request()->input('department'));
	
            
        
            }
            
            
            
                    }
            
                 });



        $logcnt= DB::table('tp_process')
        ->where('level_id', request()->input('level'))
        ->where('dept_id',request()->input('department'))
        ->where('school_id', request()->input('school'))
        ->where('session_id', request()->input('session'))
        ->where('semester_id', request()->input('semester'))
        ->where('tpstep', '=', 4)
        ->get();


       if($logcnt->count()<1){

                 $tp_process = new tp_process();
                 $tp_process->session_id=request()->input('session');
                 $tp_process->dept_id=request()->input('department');
                 $tp_process->school_id=request()->input('school');
                 $tp_process->semester_id=request()->input('semester');
                 $tp_process->level_id=request()->input('level');
                 $tp_process->tpstep=4;
                 $tp_process->save();

                 }

                
                       
            
                        return redirect()->back();
                       
            
            
                        break;
    
            
        }
    }


   public function studentgpa($exam_no,$semester,$level,$session,$school,$department){
        $totalcurrentunits=0;
        $gpa=0;
        $sumofproductofunitsandgradepoint=0;

        $sumofproductofunitsandgradepoint=$this->pulltotalPoint($exam_no,$semester,$level,$session,$school,$department);
        $totalcurrentunits=$this->pulltotalUnit($exam_no,$semester,$level,$session,$school,$department);
        
        $gpa=$sumofproductofunitsandgradepoint/$totalcurrentunits;

        //$chkquerys="SELECT * FROM studentgpa where exam_no='".$exam_no."' and level='".$level."' and department='".$department."' and semester='".$semester."' and session='".$session."'";
        //$chkresults=$this->retrieve($chkquerys);
        //$chknum=$this->numRows($chkresults);


        $chknum= DB::table('studentgpa')
        ->where('exam_no', $exam_no)
        ->where('level_id', $level)
        ->where('dept_id',$department)
        ->where('school_id', $school)
        ->where('session_id', $session)
        ->where('semester_id', $semester)
        ->get();
     
     if($chknum->count()==0){
        
       // $query="INSERT INTO `studentgpa` (exam_no,gpa,semester,level,session,school,department)
    //VALUES ('".$exam_no."','".$gpa."','".$semester."','".$level."','".$session."','".$school."','".$department."')";
       // $this->insertion($query);

        $studentgpa = new studentgpa();
        $studentgpa->exam_no=$exam_no;
        $studentgpa->gpa=$gpa;
        $studentgpa->semester_id=$semester;
        $studentgpa->session_id=$session;
        $studentgpa->dept_id=$department;
        $studentgpa->school_id=$school;
        $studentgpa->level_id=$level;
        $studentgpa->save();






     }
    }


   public static function pulltotalPoint($exam_no,$level,$session,$semester,$school,$department){
        $output=0;
        //$gquery="SELECT studenttotalgpoint from student_total_point where exam_no = '".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."'";
        //$gresults=$this->retrieve($gquery);
        //$grows=$this->arrayFetch($gresults);


        $grow= DB::table('student_total_point')
        ->where('exam_no', $exam_no)
        ->where('level_id', $level)
        ->where('dept_id',$department)
        ->where('school_id', $school)
        ->where('session_id', $session)
        ->where('semester_id', $semester)
        ->first();
    
        $output=$grow->studenttotalgpoint;
        return $output;
    }


    public static function pulltotalUnit($exam_no,$level,$session,$semester,$school,$department){
        $output=0;

        $grow= DB::table('total_unit')
        ->where('exam_no', $exam_no)
        ->where('level_id', $level)
        ->where('dept_id',$department)
        ->where('school_id', $school)
        ->where('session_id', $session)
        ->where('semester_id', $semester)
        ->first();

        //$gquery="SELECT unit from total_unit where exam_no = '".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."'and school='".$school."' and department='".$department."'";
       // $gresults=$this->retrieve($gquery);
       // $grows=$this->arrayFetch($gresults);
       // foreach($grows as $grow){
            
        $output=$grow->unit;
            
       // }
    return $output;
    }

   public function unitsandgradepointproduct($exam_no,$semester,$level,$session,$school,$department){
	
        $product=0;
        
        
        $units= DB::table('unitsandgradeproduct')->select(DB::raw('SUM(product) as totproduct'))
        ->where('unitsandgradeproduct.exam_no', $exam_no)
        ->where('unitsandgradeproduct.semester_id', $semester)
        ->where('unitsandgradeproduct.level_id', $level)
        ->where('unitsandgradeproduct.session_id', $session)
        ->where('unitsandgradeproduct.dept_id', $department)
        ->get();
        
        
        
        //$sql="SELECT SUM(product) as totproduct FROM `unitsandgradeproduct` WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' ";
        //$result=$this->retrieve($sql);
        //$rows=$this->arrayFetch($result);
        foreach($units as $row){
            
        $product=$row->totproduct;
        
        //$sqltp ="INSERT INTO student_total_pont (id,exam_no,studenttotalgpoint,level,semester,school,department,session ) VALUES (NULL,'".$exam_no."','".$product."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
       // $this->insertion($sqltp);
            
        }
        
        return $product;
        
        
    }
    

    public static function numberOfCourse($semester,$level,$session,$school,$department){
       
        $logcnt= DB::table('courses')
        ->where('level_id',$level)
        ->where('dept_id',$department)
        ->where('session_id',$session)
        ->where('semester_id',$semester)
        ->get();

        
        return $logcnt->count();
    }

    public static function gradePoint($score){
        $student_grade="";
        
        if(is_numeric($score)){
        if($score >=self::gradepoints(1)){
        $student_grade.='A'	;
            
        }
        else if($score >=self::gradepoints(2)){
            
        $student_grade.='AB'	;	
            
        }
        
        else if($score >=self::gradepoints(3)){
            
        $student_grade.='B'	;	
            
        }
        else if($score >=self::gradepoints(4)){
            
        $student_grade.='BC'	;	
            
        }
        
        else if($score >=self::gradepoints(5)){
            
        $student_grade.='C'	;	
            
        }
        
        else if($score >=self::gradepoints(6)){
            
        $student_grade.='CD'	;	
            
        }
        else if($score >=self::gradepoints(7)){
            
        $student_grade.='D'	;	
            
        }
        else if($score >=self::gradepoints(8)){
            
        $student_grade.='E'	;	
            
        }
        else if($score >= self::gradepoints(9)){
            
        $student_grade.='F'	;	
            
        }
                
        }else{
            
            $student_grade.='*'	;
        }
        return $student_grade;
    }


   public static function gradepoints($grade){
    $output=0;
    $grade= DB::table('grades')
    ->where('g_serial',$grade)
    ->get();
        
        foreach($grade as $row){
            $output=$row->g_point;
            
        }
        return $output;
    }

    public static function gradeweight($grade){
     $output=0;
     $grades= DB::table('grades')
    ->where('g_serial',$grade)
    ->get();
       foreach($grades as $row){
            $output=$row->g_weight;
            
        }
        return $output;
    }


   public  function getcourseunit($val,$department,$semester,$session,$level){
	
        $courseunit=0;

        $row= DB::table('courses')
        ->where('code',$val)
        ->where('dept_id',$department)
        ->where('session_id',$session)
        ->where('level_id',$session)
        ->where('semester_id',$semester)
        ->first();

        $courseunit=$row->unit;	
        return $courseunit;
    }



 public function computegradePoint($exam_no,$semester,$level,$session,$school,$department){
	
        $coursecount=$this->numberOfCourse($semester,$level,$session,$school,$department);

        $results= DB::table('results')
        ->where('exam_no',$exam_no)
        ->where('level_id',$level)
        ->where('dept_id',$department)
        ->where('session_id',$session)
        ->where('semester_id',$semester)
        ->get();
        
       // $gquery="SELECT scores,code from results where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
       // $gresults=$this->retrieve($gquery);
       // $grows=$this->arrayFetch($gresults);
        
        
        foreach($results as $grow){
    
               
        if(is_numeric($grow->scores)){
            
            
        if($grow->scores >= $this->gradepoints(1)){


            $gradecnt= DB::table('grade_point')
            ->where('exam_no',$exam_no)
            ->where('level_id',$level)
            ->where('dept_id',$department)
            ->where('session_id',$session)
            ->where('semester_id',$semester)
            ->get();
            
            
            //$chq="SELECT * from grade_point where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
            //$chqresults=$this->retrieve($chq);
            //$num=$this->numRows($chqresults);


            if($gradecnt->count()<$coursecount){

                $grade_point = new grade_point();
                $grade_point->exam_no=$exam_no;
                $grade_point->gpoint=$this->gradeweight(1);
                $grade_point->unit=$this->getcourseunit($grow->code,$department,$semester,$session,$level);
                $grade_point->level_id=$level;
                $grade_point->semester_id=$semester;
                $grade_point->school_id=$school;
                $grade_point->dept_id=$department;
                $grade_point->session_id=$session;
                $grade_point->save();

            
        //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$this->gradeweight(1)."','".$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
        //$this->insertion($sqlx);

        $unitsandgrade= DB::table('unitsandgradeproduct')
        ->where('exam_no',$exam_no)
        ->where('level_id',$level)
        ->where('dept_id',$department)
        ->where('session_id',$session)
        ->where('semester_id',$semester)
        ->where('school_id',$school)
        ->where('course_code_unit',$grow->code)
        ->get();

        
        //$chkquerys="SELECT * FROM unitsandgradeproduct WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' and school='".$school."' and course_code_unit='".$grow['code']."'";
        //$chkresults=$this->retrieve($chkquerys);
        //$chknum=$this->numRows($chkresults);
        if($unitsandgrade->count()<1){	
        
       // $sqlp ="INSERT INTO unitsandgradeproduct(exam_no,course_code_unit,product,level,semester,school,department,session ) VALUES ('".$exam_no."','".$grow['code']."','".$this->gradeweight(1)*$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
       // $this->insertion($sqlp);

        $unitsandgradeproduct = new unitsandgradeproduct();
        $unitsandgradeproduct->exam_no=$exam_no;
        $unitsandgradeproduct->course_code_unit=$grow->code;
        $unitsandgradeproduct->product=$this->gradeweight(1)*$this->getcourseunit($grow->code,$department,$semester,$session,$level);
        $unitsandgradeproduct->level_id=$level;
        $unitsandgradeproduct->semester_id=$semester;
        $unitsandgradeproduct->school_id=$school;
        $unitsandgradeproduct->dept_id=$department;
        $unitsandgradeproduct->session_id=$session;
        $unitsandgradeproduct->save();



        }
        
            }	
        }
        else if($grow->scores >= $this->gradepoints(2)){
        
            $gradecnt= DB::table('grade_point')
            ->where('exam_no',$exam_no)
            ->where('level_id',$level)
            ->where('dept_id',$department)
            ->where('session_id',$session)
            ->where('semester_id',$semester)
            ->get();
            
            
            //$chq="SELECT * from grade_point where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
            //$chqresults=$this->retrieve($chq);
            //$num=$this->numRows($chqresults);


            if($gradecnt->count()<$coursecount){

                $grade_point = new grade_point();
                $grade_point->exam_no=$exam_no;
                $grade_point->gpoint=$this->gradeweight(2);
                $grade_point->unit=$this->getcourseunit($grow->code,$department,$semester,$session,$level);
                $grade_point->level_id=$level;
                $grade_point->semester_id=$semester;
                $grade_point->school_id=$school;
                $grade_point->dept_id=$department;
                $grade_point->session_id=$session;
                $grade_point->save();

            
        //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$this->gradeweight(1)."','".$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
        //$this->insertion($sqlx);

        $unitsandgrade= DB::table('unitsandgradeproduct')
        ->where('exam_no',$exam_no)
        ->where('level_id',$level)
        ->where('dept_id',$department)
        ->where('session_id',$session)
        ->where('semester_id',$semester)
        ->where('school_id',$school)
        ->where('course_code_unit',$grow->code)
        ->get();

        
        //$chkquerys="SELECT * FROM unitsandgradeproduct WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' and school='".$school."' and course_code_unit='".$grow['code']."'";
        //$chkresults=$this->retrieve($chkquerys);
        //$chknum=$this->numRows($chkresults);
        if($unitsandgrade->count()<1){	
        
       // $sqlp ="INSERT INTO unitsandgradeproduct(exam_no,course_code_unit,product,level,semester,school,department,session ) VALUES ('".$exam_no."','".$grow['code']."','".$this->gradeweight(1)*$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
       // $this->insertion($sqlp);

        $unitsandgradeproduct = new unitsandgradeproduct();
        $unitsandgradeproduct->exam_no=$exam_no;
        $unitsandgradeproduct->course_code_unit=$grow->code;
        $unitsandgradeproduct->product=$this->gradeweight(2)*$this->getcourseunit($grow->code,$department,$semester,$session,$level);
        $unitsandgradeproduct->level_id=$level;
        $unitsandgradeproduct->semester_id=$semester;
        $unitsandgradeproduct->school_id=$school;
        $unitsandgradeproduct->dept_id=$department;
        $unitsandgradeproduct->session_id=$session;
        $unitsandgradeproduct->save();



        }
        
            }	
        }
        
        else if($grow->scores >= $this->gradepoints(3)){
            $gradecnt= DB::table('grade_point')
            ->where('exam_no',$exam_no)
            ->where('level_id',$level)
            ->where('dept_id',$department)
            ->where('session_id',$session)
            ->where('semester_id',$semester)
            ->get();
            
            
            //$chq="SELECT * from grade_point where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
            //$chqresults=$this->retrieve($chq);
            //$num=$this->numRows($chqresults);


            if($gradecnt->count()<$coursecount){

                $grade_point = new grade_point();
                $grade_point->exam_no=$exam_no;
                $grade_point->gpoint=$this->gradeweight(3);
                $grade_point->unit=$this->getcourseunit($grow->code,$department,$semester,$session,$level);
                $grade_point->level_id=$level;
                $grade_point->semester_id=$semester;
                $grade_point->school_id=$school;
                $grade_point->dept_id=$department;
                $grade_point->session_id=$session;
                $grade_point->save();

            
        //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$this->gradeweight(1)."','".$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
        //$this->insertion($sqlx);

        $unitsandgrade= DB::table('unitsandgradeproduct')
        ->where('exam_no',$exam_no)
        ->where('level_id',$level)
        ->where('dept_id',$department)
        ->where('session_id',$session)
        ->where('semester_id',$semester)
        ->where('school_id',$school)
        ->where('course_code_unit',$grow->code)
        ->get();

        
        //$chkquerys="SELECT * FROM unitsandgradeproduct WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' and school='".$school."' and course_code_unit='".$grow['code']."'";
        //$chkresults=$this->retrieve($chkquerys);
        //$chknum=$this->numRows($chkresults);
        if($unitsandgrade->count()<1){	
        
       // $sqlp ="INSERT INTO unitsandgradeproduct(exam_no,course_code_unit,product,level,semester,school,department,session ) VALUES ('".$exam_no."','".$grow['code']."','".$this->gradeweight(1)*$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
       // $this->insertion($sqlp);

        $unitsandgradeproduct = new unitsandgradeproduct();
        $unitsandgradeproduct->exam_no=$exam_no;
        $unitsandgradeproduct->course_code_unit=$grow->code;
        $unitsandgradeproduct->product=$this->gradeweight(3)*$this->getcourseunit($grow->code,$department,$semester,$session,$level);
        $unitsandgradeproduct->level_id=$level;
        $unitsandgradeproduct->semester_id=$semester;
        $unitsandgradeproduct->school_id=$school;
        $unitsandgradeproduct->dept_id=$department;
        $unitsandgradeproduct->session_id=$session;
        $unitsandgradeproduct->save();



        }
        
            }
        }
        else if($grow->scores >= $this->gradepoints(4)){
        
            $gradecnt= DB::table('grade_point')
            ->where('exam_no',$exam_no)
            ->where('level_id',$level)
            ->where('dept_id',$department)
            ->where('session_id',$session)
            ->where('semester_id',$semester)
            ->get();
            
            
            //$chq="SELECT * from grade_point where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
            //$chqresults=$this->retrieve($chq);
            //$num=$this->numRows($chqresults);


            if($gradecnt->count()<$coursecount){

                $grade_point = new grade_point();
                $grade_point->exam_no=$exam_no;
                $grade_point->gpoint=$this->gradeweight(4);
                $grade_point->unit=$this->getcourseunit($grow->code,$department,$semester,$session,$level);
                $grade_point->level_id=$level;
                $grade_point->semester_id=$semester;
                $grade_point->school_id=$school;
                $grade_point->dept_id=$department;
                $grade_point->session_id=$session;
                $grade_point->save();

            
        //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$this->gradeweight(1)."','".$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
        //$this->insertion($sqlx);

        $unitsandgrade= DB::table('unitsandgradeproduct')
        ->where('exam_no',$exam_no)
        ->where('level_id',$level)
        ->where('dept_id',$department)
        ->where('session_id',$session)
        ->where('semester_id',$semester)
        ->where('school_id',$school)
        ->where('course_code_unit',$grow->code)
        ->get();

        
        //$chkquerys="SELECT * FROM unitsandgradeproduct WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' and school='".$school."' and course_code_unit='".$grow['code']."'";
        //$chkresults=$this->retrieve($chkquerys);
        //$chknum=$this->numRows($chkresults);
        if($unitsandgrade->count()<1){	
        
       // $sqlp ="INSERT INTO unitsandgradeproduct(exam_no,course_code_unit,product,level,semester,school,department,session ) VALUES ('".$exam_no."','".$grow['code']."','".$this->gradeweight(1)*$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
       // $this->insertion($sqlp);

        $unitsandgradeproduct = new unitsandgradeproduct();
        $unitsandgradeproduct->exam_no=$exam_no;
        $unitsandgradeproduct->course_code_unit=$grow->code;
        $unitsandgradeproduct->product=$this->gradeweight(4)*$this->getcourseunit($grow->code,$department,$semester,$session,$level);
        $unitsandgradeproduct->level_id=$level;
        $unitsandgradeproduct->semester_id=$semester;
        $unitsandgradeproduct->school_id=$school;
        $unitsandgradeproduct->dept_id=$department;
        $unitsandgradeproduct->session_id=$session;
        $unitsandgradeproduct->save();



        }
        
            }
        }
        
        else if($grow->scores >= $this->gradepoints(5)){
            
            $gradecnt= DB::table('grade_point')
            ->where('exam_no',$exam_no)
            ->where('level_id',$level)
            ->where('dept_id',$department)
            ->where('session_id',$session)
            ->where('semester_id',$semester)
            ->get();
            
            
            //$chq="SELECT * from grade_point where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
            //$chqresults=$this->retrieve($chq);
            //$num=$this->numRows($chqresults);


            if($gradecnt->count()<$coursecount){

                $grade_point = new grade_point();
                $grade_point->exam_no=$exam_no;
                $grade_point->gpoint=$this->gradeweight(5);
                $grade_point->unit=$this->getcourseunit($grow->code,$department,$semester,$session,$level);
                $grade_point->level_id=$level;
                $grade_point->semester_id=$semester;
                $grade_point->school_id=$school;
                $grade_point->dept_id=$department;
                $grade_point->session_id=$session;
                $grade_point->save();

            
        //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$this->gradeweight(1)."','".$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
        //$this->insertion($sqlx);

        $unitsandgrade= DB::table('unitsandgradeproduct')
        ->where('exam_no',$exam_no)
        ->where('level_id',$level)
        ->where('dept_id',$department)
        ->where('session_id',$session)
        ->where('semester_id',$semester)
        ->where('school_id',$school)
        ->where('course_code_unit',$grow->code)
        ->get();

        
        //$chkquerys="SELECT * FROM unitsandgradeproduct WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' and school='".$school."' and course_code_unit='".$grow['code']."'";
        //$chkresults=$this->retrieve($chkquerys);
        //$chknum=$this->numRows($chkresults);
        if($unitsandgrade->count()<1){	
        
       // $sqlp ="INSERT INTO unitsandgradeproduct(exam_no,course_code_unit,product,level,semester,school,department,session ) VALUES ('".$exam_no."','".$grow['code']."','".$this->gradeweight(1)*$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
       // $this->insertion($sqlp);

        $unitsandgradeproduct = new unitsandgradeproduct();
        $unitsandgradeproduct->exam_no=$exam_no;
        $unitsandgradeproduct->course_code_unit=$grow->code;
        $unitsandgradeproduct->product=$this->gradeweight(5)*$this->getcourseunit($grow->code,$department,$semester,$session,$level);
        $unitsandgradeproduct->level_id=$level;
        $unitsandgradeproduct->semester_id=$semester;
        $unitsandgradeproduct->school_id=$school;
        $unitsandgradeproduct->dept_id=$department;
        $unitsandgradeproduct->session_id=$session;
        $unitsandgradeproduct->save();



        }
        
            }
        }
        
        else if($grow->scores >= $this->gradepoints(6)){
            
            $gradecnt= DB::table('grade_point')
            ->where('exam_no',$exam_no)
            ->where('level_id',$level)
            ->where('dept_id',$department)
            ->where('session_id',$session)
            ->where('semester_id',$semester)
            ->get();
            
            
            //$chq="SELECT * from grade_point where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
            //$chqresults=$this->retrieve($chq);
            //$num=$this->numRows($chqresults);


            if($gradecnt->count()<$coursecount){

                $grade_point = new grade_point();
                $grade_point->exam_no=$exam_no;
                $grade_point->gpoint=$this->gradeweight(6);
                $grade_point->unit=$this->getcourseunit($grow->code,$department,$semester,$session,$level);
                $grade_point->level_id=$level;
                $grade_point->semester_id=$semester;
                $grade_point->school_id=$school;
                $grade_point->dept_id=$department;
                $grade_point->session_id=$session;
                $grade_point->save();

            
        //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$this->gradeweight(1)."','".$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
        //$this->insertion($sqlx);

        $unitsandgrade= DB::table('unitsandgradeproduct')
        ->where('exam_no',$exam_no)
        ->where('level_id',$level)
        ->where('dept_id',$department)
        ->where('session_id',$session)
        ->where('semester_id',$semester)
        ->where('school_id',$school)
        ->where('course_code_unit',$grow->code)
        ->get();

        
        //$chkquerys="SELECT * FROM unitsandgradeproduct WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' and school='".$school."' and course_code_unit='".$grow['code']."'";
        //$chkresults=$this->retrieve($chkquerys);
        //$chknum=$this->numRows($chkresults);
        if($unitsandgrade->count()<1){	
        
       // $sqlp ="INSERT INTO unitsandgradeproduct(exam_no,course_code_unit,product,level,semester,school,department,session ) VALUES ('".$exam_no."','".$grow['code']."','".$this->gradeweight(1)*$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
       // $this->insertion($sqlp);

        $unitsandgradeproduct = new unitsandgradeproduct();
        $unitsandgradeproduct->exam_no=$exam_no;
        $unitsandgradeproduct->course_code_unit=$grow->code;
        $unitsandgradeproduct->product=$this->gradeweight(6)*$this->getcourseunit($grow->code,$department,$semester,$session,$level);
        $unitsandgradeproduct->level_id=$level;
        $unitsandgradeproduct->semester_id=$semester;
        $unitsandgradeproduct->school_id=$school;
        $unitsandgradeproduct->dept_id=$department;
        $unitsandgradeproduct->session_id=$session;
        $unitsandgradeproduct->save();



        }
        
            }
            
        }
        else if($grow->scores >= $this->gradepoints(7)){
            
            $gradecnt= DB::table('grade_point')
            ->where('exam_no',$exam_no)
            ->where('level_id',$level)
            ->where('dept_id',$department)
            ->where('session_id',$session)
            ->where('semester_id',$semester)
            ->get();
            
            
            //$chq="SELECT * from grade_point where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
            //$chqresults=$this->retrieve($chq);
            //$num=$this->numRows($chqresults);


            if($gradecnt->count()<$coursecount){

                $grade_point = new grade_point();
                $grade_point->exam_no=$exam_no;
                $grade_point->gpoint=$this->gradeweight(7);
                $grade_point->unit=$this->getcourseunit($grow->code,$department,$semester,$session,$level);
                $grade_point->level_id=$level;
                $grade_point->semester_id=$semester;
                $grade_point->school_id=$school;
                $grade_point->dept_id=$department;
                $grade_point->session_id=$session;
                $grade_point->save();

            
        //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$this->gradeweight(1)."','".$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
        //$this->insertion($sqlx);

        $unitsandgrade= DB::table('unitsandgradeproduct')
        ->where('exam_no',$exam_no)
        ->where('level_id',$level)
        ->where('dept_id',$department)
        ->where('session_id',$session)
        ->where('semester_id',$semester)
        ->where('school_id',$school)
        ->where('course_code_unit',$grow->code)
        ->get();

        
        //$chkquerys="SELECT * FROM unitsandgradeproduct WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' and school='".$school."' and course_code_unit='".$grow['code']."'";
        //$chkresults=$this->retrieve($chkquerys);
        //$chknum=$this->numRows($chkresults);
        if($unitsandgrade->count()<1){	
        
       // $sqlp ="INSERT INTO unitsandgradeproduct(exam_no,course_code_unit,product,level,semester,school,department,session ) VALUES ('".$exam_no."','".$grow['code']."','".$this->gradeweight(1)*$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
       // $this->insertion($sqlp);

        $unitsandgradeproduct = new unitsandgradeproduct();
        $unitsandgradeproduct->exam_no=$exam_no;
        $unitsandgradeproduct->course_code_unit=$grow->code;
        $unitsandgradeproduct->product=$this->gradeweight(7)*$this->getcourseunit($grow->code,$department,$semester,$session,$level);
        $unitsandgradeproduct->level_id=$level;
        $unitsandgradeproduct->semester_id=$semester;
        $unitsandgradeproduct->school_id=$school;
        $unitsandgradeproduct->dept_id=$department;
        $unitsandgradeproduct->session_id=$session;
        $unitsandgradeproduct->save();



        }
        
            }
            
        }
        else if($grow->scores >= $this->gradepoints(8)){
            
            $gradecnt= DB::table('grade_point')
            ->where('exam_no',$exam_no)
            ->where('level_id',$level)
            ->where('dept_id',$department)
            ->where('session_id',$session)
            ->where('semester_id',$semester)
            ->get();
            
            
            //$chq="SELECT * from grade_point where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
            //$chqresults=$this->retrieve($chq);
            //$num=$this->numRows($chqresults);


            if($gradecnt->count()<$coursecount){

                $grade_point = new grade_point();
                $grade_point->exam_no=$exam_no;
                $grade_point->gpoint=$this->gradeweight(8);
                $grade_point->unit=$this->getcourseunit($grow->code,$department,$semester,$session,$level);
                $grade_point->level_id=$level;
                $grade_point->semester_id=$semester;
                $grade_point->school_id=$school;
                $grade_point->dept_id=$department;
                $grade_point->session_id=$session;
                $grade_point->save();

            
        //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$this->gradeweight(1)."','".$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
        //$this->insertion($sqlx);

        $unitsandgrade= DB::table('unitsandgradeproduct')
        ->where('exam_no',$exam_no)
        ->where('level_id',$level)
        ->where('dept_id',$department)
        ->where('session_id',$session)
        ->where('semester_id',$semester)
        ->where('school_id',$school)
        ->where('course_code_unit',$grow->code)
        ->get();

        
        //$chkquerys="SELECT * FROM unitsandgradeproduct WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' and school='".$school."' and course_code_unit='".$grow['code']."'";
        //$chkresults=$this->retrieve($chkquerys);
        //$chknum=$this->numRows($chkresults);
        if($unitsandgrade->count()<1){	
        
       // $sqlp ="INSERT INTO unitsandgradeproduct(exam_no,course_code_unit,product,level,semester,school,department,session ) VALUES ('".$exam_no."','".$grow['code']."','".$this->gradeweight(1)*$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
       // $this->insertion($sqlp);

        $unitsandgradeproduct = new unitsandgradeproduct();
        $unitsandgradeproduct->exam_no=$exam_no;
        $unitsandgradeproduct->course_code_unit=$grow->code;
        $unitsandgradeproduct->product=$this->gradeweight(8)*$this->getcourseunit($grow->code,$department,$semester,$session,$level);
        $unitsandgradeproduct->level_id=$level;
        $unitsandgradeproduct->semester_id=$semester;
        $unitsandgradeproduct->school_id=$school;
        $unitsandgradeproduct->dept_id=$department;
        $unitsandgradeproduct->session_id=$session;
        $unitsandgradeproduct->save();



        }
        
            }
            
        }
        else if($grow->scores >= $this->gradepoints(9)){
        
            $gradecnt= DB::table('grade_point')
            ->where('exam_no',$exam_no)
            ->where('level_id',$level)
            ->where('dept_id',$department)
            ->where('session_id',$session)
            ->where('semester_id',$semester)
            ->get();
            
            
            //$chq="SELECT * from grade_point where exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."'and session='".$session."' and department='".$department."'";
            //$chqresults=$this->retrieve($chq);
            //$num=$this->numRows($chqresults);


            if($gradecnt->count()<$coursecount){

                $grade_point = new grade_point();
                $grade_point->exam_no=$exam_no;
                $grade_point->gpoint=$this->gradeweight(9);
                $grade_point->unit=$this->getcourseunit($grow->code,$department,$semester,$session,$level);
                $grade_point->level_id=$level;
                $grade_point->semester_id=$semester;
                $grade_point->school_id=$school;
                $grade_point->dept_id=$department;
                $grade_point->session_id=$session;
                $grade_point->save();

            
        //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$this->gradeweight(1)."','".$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
        //$this->insertion($sqlx);

        $unitsandgrade= DB::table('unitsandgradeproduct')
        ->where('exam_no',$exam_no)
        ->where('level_id',$level)
        ->where('dept_id',$department)
        ->where('session_id',$session)
        ->where('semester_id',$semester)
        ->where('school_id',$school)
        ->where('course_code_unit',$grow->code)
        ->get();

        
        //$chkquerys="SELECT * FROM unitsandgradeproduct WHERE  exam_no='".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and department='".$department."' and school='".$school."' and course_code_unit='".$grow['code']."'";
        //$chkresults=$this->retrieve($chkquerys);
        //$chknum=$this->numRows($chkresults);
        if($unitsandgrade->count()<1){	
        
       // $sqlp ="INSERT INTO unitsandgradeproduct(exam_no,course_code_unit,product,level,semester,school,department,session ) VALUES ('".$exam_no."','".$grow['code']."','".$this->gradeweight(1)*$this->getcourseunit($grow['code'],$department,$semester,$session,$level)."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
       // $this->insertion($sqlp);

        $unitsandgradeproduct = new unitsandgradeproduct();
        $unitsandgradeproduct->exam_no=$exam_no;
        $unitsandgradeproduct->course_code_unit=$grow->code;
        $unitsandgradeproduct->product=$this->gradeweight(9)*$this->getcourseunit($grow->code,$department,$semester,$session,$level);
        $unitsandgradeproduct->level_id=$level;
        $unitsandgradeproduct->semester_id=$semester;
        $unitsandgradeproduct->school_id=$school;
        $unitsandgradeproduct->dept_id=$department;
        $unitsandgradeproduct->session_id=$session;
        $unitsandgradeproduct->save();



        }
        
            }
        
        }		
        }else{
            
        //$sqlx ="INSERT INTO grade_point (exam_no, gpoint,level,semester,school,department,session ) VALUES ('".$exam_no."','0','".$level."','".$semester."','".$school."','".$department."','".$session."')";
        //$this->insertion($sqlx);
        }
            
        }
    }



    


    function totalgradepoint($exam_no,$semester,$level,$session,$school,$department){
	
	
        $gradepoints= DB::table('grade_point')->select(DB::raw('SUM(gpoint) as totgpoint'))
        ->where('grade_point.exam_no', $exam_no)
        ->where('grade_point.session_id', $session)
        ->where('grade_point.level_id', $level)
        ->where('grade_point.dept_id', $department)
        ->where('grade_point.semester_id', $semester)
        ->where('grade_point.school_id', $school)
        ->get();
        
        
        
        //$sql="SELECT SUM(gpoint) as totgpoint FROM `grade_point` WHERE exam_no = '".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."' and school='".$school."' and department='".$department."'";
        //$result=$this->retrieve($sql);
        //$rows=$this->arrayFetch($result);
        foreach($gradepoints as $row){
        
        
          $tgpoint= DB::table('total_grade_point')
                ->where('exam_no',$exam_no)
                ->where('level_id',$level)
                ->where('dept_id',$department)
                ->where('session_id',$session)
                ->where('semester_id',$semester)
                ->get();
                
                
        
     //$chkquerys="SELECT * FROM total_grade_point where exam_no='".$exam_no."' and level='".$level."' and department='".$department."' and semester='".$semester."' and session='".$session."'";
       // $chkresults=$this->retrieve($chkquerys);
        //$chknum=$this->numRows($chkresults);
     
     if($tgpoint->count()==0){	
     
     
     
                    $total_grade_point = new total_grade_point();
                    $total_grade_point->exam_no=$exam_no;
                    $total_grade_point->totalgpoint=$row->totgpoint;
                    $total_grade_point->level_id=$level;
                    $total_grade_point->semester_id=$semester;
                    $total_grade_point->school_id=$school;
                    $total_grade_point->dept_id=$department;
                    $total_grade_point->session_id=$session;
                    $total_grade_point->save();
    
     
     
     
        //$sqlx ="INSERT INTO total_grade_point (exam_no,totalgpoint,level,semester,school,department,session ) VALUES ('".$exam_no."','".$row['totgpoint']."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
        //$this->insertion($sqlx);
        
        
     }
            
        }
        
    }




    public function openschool()
    {
       
        $school= DB::table('schools')->get(); 
        return view('school',['schools'=>$school]);

    }


    public function departments()
    {
       
        

        $dept= DB::table('departments')->select('departments.department','departments.dept_id','schools.school')
        ->join('schools','schools.school_id','=','departments.school_id') 
        ->get(); 

        return view('department',['departments'=>$dept]);

    }


    public function add_student()
    {
       
        return view('add_student');

    }


    public function add_account()
    {
       
        return view('add_account');

    }

    public function sessions(){


        $sessions= DB::table('school_sessions')->get(); 
        return view('sessions',['sessions'=>$sessions]);

        
    }


    public function staff()
    {
        $staffs= DB::table('staffs_info')->get(); 
        return view('staff',['staffs'=>$staffs]);

    }

    public function programs()
    {
        $programx= DB::table('programs')->get(); 
        return view('programs',['programs'=>$programx]);

    }

    public function results()
    {
        
        return view('results');

    }

    public function staffPost()
    {
        $validator=$this->validate(request(),[
            'name'=>'required|string',
            'phone'=>'required|string',
            'email'=>'required|string',
            'school'=>'required|string',
            'department'=>'required|string',
           
            ],
            [
             ]);

             if(count(request()->all()) > 0){

               
                $name = request()->input('name');
                $phone= request()->input('phone');
                $email= request()->input('email');
                $school= request()->input('school');
                $department= request()->input('department');

                 //////////// create data //////////////////////

                 $staffs = new staffs();
                 $staffs->name=$name;
                 $staffs->phone=$phone;
                 $staffs->school=$this->pullschoolnamevalue($school);
                 $staffs->department=$this->pulldepartmentnamevalue($department);
                 $staffs->email=$email;
                 $staffs->staff_number="";
                 if($staffs->save()){

                    return redirect()->back()->withSuccess('staff uploaded succesfully');

                 }
                
            
            
            
            }

    }


    public static function encrypt_decrypt ($data, $encrypt) {
        if ($encrypt == true) {
            $output = base64_encode (convert_uuencode ($data));
        } else {
            $output = convert_uudecode (base64_decode ($data));
        }
        return $output;
        
        
        
    }



    public function post_account()
    {
        $validator=$this->validate(request(),[
            'name'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string',
            'cpassword'=>'required|string',
            'acctype'=>'required|string',
           
            ],
            [
            'name.required'=>'Please enter name ',
            'email.required'=>'Please enter email ',
            'password.required'=>'Please enter password ',
            'acctype.required'=>'Please choose account type ',
             ]);

             if(count(request()->all()) > 0){

               
                if(request()->input('cpassword')!=request()->input('password')){

                    return redirect()->back()->withErrors('Confirm password and password are not the same'); 
                }
                else{

                    $encodePass=$this->encrypt_decrypt(request()->input('password'), true);
                    $date=Carbon::now()->toDateString();
                    $account = new account();
                    $account->name=request()->input('name');
                    $account->email=request()->input('email');
                    $account->password= $encodePass;
                    $account->insertdate= $date;
                    $account->acctype=request()->input('acctype');
                    $account->staff_id=0;
                    $account->phone_number=0;
                    $account->created_at= $date;
                    $account->updated_at= $date;
                    if($account->save()){

                        return redirect()->back()->withSuccess('new user uploaded succesfully');
    
                     }

                }

                
                
                 
                
            
            
            
            }

    }




    public function new_staff()
    {
        
        return view('add_staff');

    }

    public function edit_invest($id){

        $investments= DB::table('investments')->where('id', $id)->first();
        return view('edit_invest',['investment'=>$investments]);
    }

    public function edit_infra($id){

        $infrastructures= DB::table('infrastructures')->where('id', $id)->first();
        return view('edit_infra',['infrastructure'=>$infrastructures]);
    }

    public function edit_student($id)
    {
        $passport= DB::table('passport')->where('Student_id', $id)->first();

        $student= DB::table('exam_records')
        ->select('exam_records.student_id','exam_records.exam_no','exam_records.name','levels.level','levels.level_id','departments.department','departments.dept_id','schools.school','schools.school_id')
        ->join('levels','levels.level_id','=','exam_records.level_id') 
        ->join('departments','departments.dept_id','=','exam_records.dept_id') 
        ->join('schools','schools.school_id','=','exam_records.school_id') 
        ->where('exam_records.student_id', $id)
        ->first(); 


        return view('edit_student',['student'=>$student,'passport'=>$passport]);

    }

    public static function pull_school()
    {
        $output="";
        $schools= DB::table('schools')->get(); 
       
	 foreach($schools as $school){
       
		$output.='<option value="'.$school->school_id.'">'. $school->school.'</option>';
		}
	return $output;	
        

    }


    public static function pull_session()
    {
        $output="";

    $sessions= DB::table('school_sessions')->get(); 
	
	foreach($sessions as $row){
			
		$output.='<option value="'.$row->session_id.'">'. $row->session.'</option>';	
	}
	return $output;
        

    }

    
   
   
    public function pullstudent(Request $request){
   
       $validator=$this->validate(request(),[
           'school'=>'required|string',
           'session'=>'required|string',
          
           ],
           [

            'school.required'=>'Please choose school ',
            'session.required'=>'Please choose school session ',

            ]);
   
            if(count(request()->all()) > 0){
   
                
               $school =  $request->input('school');
               $session=  $request->input('session');
                  
               
              

               $examRecords= DB::table('exam_records')
               ->select('exam_records.student_id','exam_records.exam_no','exam_records.name','levels.level','departments.department','schools.school','school_sessions.session')
               ->join('levels','levels.level_id','=','exam_records.level_id') 
               ->join('departments','departments.dept_id','=','exam_records.dept_id') 
               ->join('schools','schools.school_id','=','exam_records.school_id') 
               ->join('school_sessions','school_sessions.session_id','=','exam_records.session_id') 
               ->where('exam_records.school_id', $school)
               ->where('exam_records.session_id', $session)
                ->get(); 
   
              
               return view('student_filter',['records'=>$examRecords,'school'=>$school,'session'=>$session]);
   
            }
   
   
   
    }



    


    public function filterdepartment(Request $request)
 {
     $output="";
    $departments= DB::table('departments')->where('school_id', $request->school)->get(); 
        
    foreach($departments as $department){
    
        $output.="<option value=".$department->dept_id.">".$department->department."</option>";
    
    }


            echo $output;
 }




 public function submitupdate(Request $request)
 {
     $output="";
     $departments=DB::table('staffs_info')->where('staff_id', $request->staff)->update(['name' =>$request->name, 'phone' => $request->phone,'email' => $request->email,'school' => $request->school,'department' => $request->dept]);
                
     $output='success';
     echo $output;
 }

 public function submitschedule(Request $request)
 {
             $programs = new programs();
             $programs->activity=$request->activity;
             $programs->venue=$request->venue;
             $programs->time=$request->time;
             $programs->attend=$request->attend;
             $programs->timezone=$request->timezone;
             $programs->postedBy=auth()->user()->name;
             $programs->save();
                     
     $output='success';
     echo $output;
 }



 public function addtranscribed(Request $request)
 {

    $validator=$this->validate(request(),[
        'content'=>'required|string',
         
        ],
        [

         'content.required'=>'Please paste transcribe in box before save ',
        

         ]);

         if(count(request()->all()) > 0){


            $audiofile= request()->file('file');
            $original_filename = strtolower(trim($audiofile->getClientOriginalName()));
            $fileName =  time().rand(100,999).$original_filename;
            $filePath = 'caption_photos';
            $filePathdb = asset('/caption_photos/'.$fileName);
            $audiofile->move($filePath,$fileName);


            
             $speeches = new speeches();
             $speeches->title=request()->input('title');
             $speeches->content=request()->input('content');
             $speeches->event_time=request()->input('time');
             $speeches->caption_photo=$filePathdb;
             $speeches->eventID=request()->input('eventid');
             $speeches->postedBy=auth()->user()->name;
             $speeches->status=0;
             $speeches->save();
                     
             return redirect()->back()->withSuccess('Speech transcribe uploaded successfully');
    

         }
 }


 public function viewtranscribed(Request $request)
 {

    $validator=$this->validate(request(),[
        'content'=>'required|string',
         
        ],
        [

         'content.required'=>'Please paste transcribe in box before save ',
        

         ]);

         if(count(request()->all()) > 0){

            
            DB::table('speech')->where('id',request()->input('id'))->update(['content' => request()->input('content'),'title' => request()->input('title'),'status' =>1]);
             
                     
             return redirect()->back()->withSuccess('Speech was updated and published successfully');
    

         }
 }

 public function uneditedspeeches(){

    $speech= DB::table('programs')
    ->select('programs.id','programs.activity','programs.created_at','programs.venue','programs.attend','speech.content','speech.postedBy','speech.status')
    ->join('speech','speech.eventID','=','programs.id')
    ->where(['speech.status' => '0'])
    ->get();

   
   return view('unedited-speeches',['speeches'=>$speech]);

 }


 public function submituser(Request $request)
 {
     $output="";
     $date=Carbon::now()->toDateString();
     $hashpassword=$this->encrypt_decrypt($request->pass,true);
     $users=DB::table('account')->where('account_id', $request->user)->update(['name' =>$request->name,'phone_number' => $request->phone,'email' => $request->email,'password' => $hashpassword,'acctype' => $request->acctype,'updated_at'=>$date]);
                
     $output='success';
     echo $output;
 }

 public function removeinvest(){

    if(!empty(request()->input('invest'))){

    foreach(request()->input('invest') as $value){

        $level = DB::delete('delete from investments where id='.$value);
        $invesments= DB::table('investments')->get();
        return view('investment',['investments'=> $invesments]);


    }
}else{

    return redirect()->back()->withErrors('Select at least one investment program to delete');

}
    
 }


 public function postspeech(Request $request){

    switch ($request->input('action')) {

        case 'publish':

            if(empty(request()->input('speech'))){





                return redirect()->back()->withErrors('Select at least one project to publish');

            }else{

           foreach(request()->input('speech') as $speech){


            $users=DB::table('speech')->where('id', $speech)->update(['status' => '1']);
            return redirect()->back()->withSuccess('Speech was published successfully');



           }

            }

          break;

        case 'unpublish':

            if(empty(request()->input('speech'))){





                return redirect()->back()->withErrors('Select at least one project to unpublish');

            }else{

                foreach(request()->input('speech') as $speech){


                    $users=DB::table('speech')->where('id', $speech)->update(['status' => '0']);
    
                    return redirect()->back()->withSuccess('Speech was unpublished successfully');
           
        
        
        
                   }

            }

            break;


        }



 }


 public function removepolicies(){

    if(!empty(request()->input('policie'))){

    foreach(request()->input('policie') as $value){

        $level = DB::delete('delete from policies where id='.$value);
        $invesments= DB::table('policies')->get();
        return view('policies',['policies'=> $invesments]);


    }
}else{

    return redirect()->back()->withErrors('Select at least one investment program to delete');

}
    
 }

 public function removeinfra(){

    if(!empty(request()->input('infrastructure'))){

    foreach(request()->input('infrastructure') as $value){

        $level = DB::delete('delete from infrastructures where id='.$value);
        $infrastructures= DB::table('infrastructures')->get();
        return view('infrastructures',['infrastructures'=> $infrastructures]);


    }
}else{

    return redirect()->back()->withErrors('Select at least one infrastructure detail to delete');

}
    
 }


 public function physicaldev(){

    $infrastructure= DB::table('infrastructures')->paginate(3); 
  
    return view('all_physical_dev',['infrastructures'=>$infrastructure]);



 }


 
 public function otherinvest($val){

    $investment= DB::table('investments')->where('category',$val)->get(); 
  
    return view('all_investment_other',['investments'=>$investment,'heading'=>$val]);



 }


 public function infrastructureupdate($id){

    $users=DB::table('infrastructures')->where('id', $id)->update(['code' =>request()->input('code'),'title' => request()->input('title'),'project_area' => request()->input('area'),'project_status' => request()->input('status'),'description' => request()->input('description'),'location' => request()->input('location'),'lga' => request()->input('lga'),'start_time' => request()->input('start'),'proposed_endtime' => request()->input('end'),'amount' => request()->input('amount'),'contractor' => request()->input('contractor'),'partnership' => request()->input('partnership'),'benefits' => request()->input('benefits')]);
    return redirect()->back()->withSuccess('Record uploaded successffully');
 }

 public function policiesupdate(){

    $users=DB::table('policies')->where('id', request()->input('id'))->update(['title_of_bill' => request()->input('title'),'description' => request()->input('description'),'date_passed' => request()->input('date_passed'),'assembly_name' => request()->input('assembly_name')]);
    return redirect()->back()->withSuccess('Record uploaded successffully');
 }

 public function investmentsupdate($id){

    $users=DB::table('investments')->where('id', $id)->update(['title' => request()->input('title'),'description' => request()->input('description'),'people_affected' => request()->input('effect'),'type_program' => request()->input('kind'),'sector' => request()->input('sector'),'estimated_impact' => request()->input('impact'),'category' => request()->input('category')]);
    return redirect()->back()->withSuccess('Record uploaded successffully');
 }

 public function pullstudentdetail($id)
 {
     $output="";
    $records= DB::table('exam_records')->where('student_id', $id)->first(); 
    return response()->json($records);
        
   
 }

 public function pullstaffdetail($id)
 {
     $output="";
    $staff= DB::table('staffs_info')->where('staff_id', $id)->first(); 
    return response()->json($staff);
        
   
 }

 public function pullscheduledetail($id)
 {
     $output="";
    $events= DB::table('programs')->where('id', $id)->first(); 
    return response()->json($events);
        
   
 }

 public function pullinfrastructuredetail($id)
 {
     $output="";
    $events= DB::table('infrastructures')->where('id', $id)->first(); 
    return response()->json($events);
        
   
 }

 public function pullinvestmentdetail($id)
 {
     $output="";
    $events= DB::table('investments')->where('id', $id)->first(); 
    return response()->json($events);
        
   
 }

 public function projectphotos($id){

    $infra= DB::table('infrastructures')->where('id', $id)->first(); 
    $photos= DB::table('infra_photos')->where('infra_id', $id)->get();
    return view('add_infra_photo',['title'=>$infra->title,'description'=>$infra->description,'id'=>$infra->id,'photos'=>$photos]);

 }

 public function investmentphotos($id){

    $infra= DB::table('investments')->where('id', $id)->first(); 
    $photos= DB::table('invest_photos')->where('invest_id', $id)->get();
    return view('add_invest_photo',['title'=>$infra->title,'description'=>$infra->description,'id'=>$infra->id,'photos'=>$photos]);

 }


 public function pullpoliciesdetail($id)
 {
     $output="";
    $events= DB::table('policies')->where('id', $id)->first(); 
    return response()->json($events);
        
   
 }



 public function boardswitch($session,$department,$semester,$level,$school){

     $courses= DB::table('courses')
    ->where('level_id', $level)
    ->where('semester_id', $semester)
    ->where('dept_id', $department)
    ->where('session_id', $session)
    ->orderBy('course_id','desc')
    ->get();

    $examRecords= DB::table('exam_records')
    ->where('school_id', $school)
    ->where('level_id', $level)
    ->where('dept_id', $department)
    ->where('session_id', $session)
    ->orderBy('student_id');
    if($semester==1){

       
       return view('firstsemester',['students'=>$examRecords,'sessionx'=>$session,'semesterx'=>$semester,'departmentx'=>$department,'levelx'=>$level,'schoolx'=>$school,'coursesx'=>$courses]);

    }
    else if($semester==2){

      return view('secondsemester',['students'=>$examRecords,'sessionx'=>$session,'semesterx'=>$semester,'departmentx'=>$department,'levelx'=>$level,'schoolx'=>$school,'coursesx'=>$courses]);

    }



 }

 public static function pulltotalUnitBackLog($exam_no,$level,$session,$school,$department){
	$output=0;
    $grow= DB::table('total_unit')
    ->where('exam_no', $exam_no)
    ->where('level_id', $level)
    ->where('dept_id',$department)
    ->where('school_id', $school)
    ->where('session_id', $session)
    ->where('semester_id',1)
    ->first();

    //$gquery="SELECT unit from total_unit where exam_no = '".$exam_no."' and semester='".$semester."' and level='".$level."' and session='".$session."'and school='".$school."' and department='".$department."'";
   // $gresults=$this->retrieve($gquery);
   // $grows=$this->arrayFetch($gresults);
   // foreach($grows as $grow){
        
    $output=$grow->unit;
        
   // }
return $output;
}

 public static function pulltotalPointBackLog($exam_no,$level,$session,$school,$department){
	$output=0;
	$grow= DB::table('student_total_point')
        ->where('exam_no', $exam_no)
        ->where('level_id', $level)
        ->where('dept_id',$department)
        ->where('school_id', $school)
        ->where('session_id', $session)
        ->where('semester_id',1)
        ->first();
    
        $output=$grow->studenttotalgpoint;
        return $output;
}

public static function pullstudentGPABackLog($exam_no,$level,$session,$school,$department){
	$output=0;

    $grows= DB::table('studentgpa')
    ->where('exam_no',$exam_no)
    ->where('level_id',$level)
    ->where('dept_id',$department)
    ->where('session_id',$session)
    ->where('semester_id',1)
    ->get();

	foreach($grows as $grow){
		
	$output=$grow->gpa;
		
	}
return $output;
}

public static function pullCGPA($exam_no,$session){
	$output=0;
	$totalUnit1=0;
	$totalUnit2=0;
	$totalgpoint1=0;
	$totalgpoint2=0;

    $grow= DB::table('total_unit')
    ->where('exam_no', $exam_no)
    ->where('session_id', $session)
    ->where('semester_id',1)
    ->first();
        
    $totalUnit1=$grow->unit;

    $growx= DB::table('total_unit')
    ->where('exam_no', $exam_no)
    ->where('session_id', $session)
    ->where('semester_id',2)
    ->first();
       
    $totalUnit2=$growx->unit;
	
	
	 
    $grow= DB::table('student_total_point')
    ->where('exam_no', $exam_no)
    ->where('session_id', $session)
    ->where('semester_id',1)
    ->first();

    $totalgpoint1=$grow->studenttotalgpoint;

    $growx= DB::table('student_total_point')
    ->where('exam_no', $exam_no)
    ->where('session_id', $session)
    ->where('semester_id',2)
    ->first();

    $totalgpoint2=$growx->studenttotalgpoint;
    
	 
	
	 
	 
	 
	$sumofgpoint=$totalgpoint1+$totalgpoint2;
	$sumofUnit= $totalUnit1+$totalUnit2;
	 
	$cgpa=$sumofgpoint/$sumofUnit;
	
	$output.=$cgpa;
	
    return $output;
}

 public static function pullstudentGPA($exam_no,$level,$session,$semester,$school,$department){
	$output=0;

    $grows= DB::table('studentgpa')
    ->where('exam_no',$exam_no)
    ->where('level_id',$level)
    ->where('dept_id',$department)
    ->where('session_id',$session)
    ->where('semester_id',$semester)
    ->get();

	foreach($grows as $grow){
		
	$output=$grow->gpa;
		
	}
return $output;
}

 public static function displayScores($exam_no,$coursecode,$level,$session,$semester,$department){

	$output="";


    $rows= DB::table('results')
    ->where('exam_no',$exam_no)
    ->where('level_id',$level)
    ->where('dept_id',$department)
    ->where('session_id',$session)
    ->where('semester_id',$semester)
    ->where('code',$coursecode)
    ->first();



	//$searchquerys1="SELECT * FROM results where exam_no='".$exam_no."' and code='".$coursecode."' and level='".$level."'and session='".$session."' and semester='".$semester."' and department='".$department."'";
    //$searchresults1=$this->retrieve($searchquerys1);
	//$rowss1=$this->arrayFetch($searchresults1);
	
		
		$output.=$rows->scores.' '.self::gradePoint($rows->scores);
	
		
	
	
	return $output;
}

 public static function recordfilter($school,$level,$department,$semester,$exam_no,$session){

    $emptyCount= DB::table('results')
    ->where('exam_no',$exam_no)
    ->where('level_id',$level)
    ->where('dept_id',$department)
    ->where('session_id',$session)
    ->where('semester_id',$semester)
    ->where('school_id',$school)
    ->get();
   
     return $emptyCount->count();
 }


 public function pullusersdetail($id)
 {
     $output="";
    $user= DB::table('account')->where('account_id', $id)->first(); 
    return response()->json($user);
        
   
 }
public function add_admin_account(){

    return view('admin_account');

}

public function add_admin_post(){

    $validator=$this->validate(request(),[
        'name'=>'required|string',
        'email'=>'required|string',
        'password'=>'required|string',
        'cpassword'=>'required|string',
       
        ],
        [
         ]);

         if(count(request()->all()) > 0){

            $name = request()->input('name');
            $email= request()->input('email');
            $password= request()->input('password');
            $cpassword= request()->input('cpassword');
            $hashpass= Hash::make(request()->input('password'));
           if($password !=$cpassword){

            return redirect()->back()->withErrors('Passwords not equal');
           }
           else{


            $user = new adminusers();
           
            $user->name=$name;
            $user->email=$email;
            $user->password= $hashpass;
        
            
            
            
           
            
            if($user->save()){

               return redirect()->back()->withSuccess('User uploaded succesfully');

            }


           }
         }


}

 public function pulladmindetail($id)
 {
     $output="";
    $user= DB::table('users')->where('id', $id)->first(); 
    return response()->json($user);
        
   
 }

 public function decryptharsh($password)
 {
    $output="";
    $output=$this->encrypt_decrypt($password, false);
   
   
            return $output;
        
   
 }





 public static function pullstudentphoto($id)
 {
     
    $passport= DB::table('passport')->where('exam_no', $id)->first(); 
    return $passport->img;
        
   
 }

 public static function pullschoolname($id)
 {
    
    $school= DB::table('schools')->where('school_id', $id)->first(); 
    return response()->json($school);
        
   
 }

 public static function pullsessionnamevalue($id)
 {
    
    $session= DB::table('school_sessions')->where('session_id', $id)->first(); 
    return  $session->session;
        
   
 }

 public static function pullschoolnamevalue($id)
 {
    
    $school= DB::table('schools')->where('school_id', $id)->first(); 
    return  $school->school;
        
   
 }


 public static function pulldepartmentnamevalue($id)
 {
    
    $deptname= DB::table('departments')->where('dept_id', $id)->first(); 
    return  $deptname->department;
        
   
 }

 public static function pulldepartmentname($id)
 {
    
    $deptname= DB::table('departments')->where('dept_id', $id)->first(); 
    return response()->json($deptname);
        
   
 }


 public static function pulllevelname($id)
 {
    
    $levels= DB::table('levels')->where('level_id', $id)->first(); 
    return $levels->level;
        
   
 }


 public static function pullsemestername($id)
 {
    
    $semester= DB::table('semester')->where('semester_id', $id)->first(); 
    return $semester->semester;
        
   
 }

 public function pulllevelnames($id)
 {
    
    $levels= DB::table('levels')->where('level_id', $id)->first(); 
    return $levels->level;
        
   
 }



 public static function get_school($id)
 {
     $output="";
    $schools= DB::table('schools')->where('school_id', $id)->first(); 
    $output=$schools->school;
        
   
            echo $output;
 }

 public static function get_session($id)
 {
     $output="";
    $sessions= DB::table('school_sessions')->where('session_id', $id)->first(); 
    $output=$sessions->session;
        
   
            echo $output;
 }


 


 public function resultscalculation(){

    $validator=$this->validate(request(),[
        'school'=>'required|string',
        'department'=>'required|string',
        'level'=>'required|string',
        'session'=>'required|string',
        'semester'=>'required|string',
       
        ],
        [
         ]);

         if(count(request()->all()) > 0){

           
            $school = request()->input('school');
            $department= request()->input('department');
            $level= request()->input('level');
            $session= request()->input('session');
            $semester= request()->input('semester');

          
////////////////////////////// check wether the result exist
            $resultChk= DB::table('results')
            ->where('school_id', $school)
            ->where('level_id', $level)
            ->where('dept_id', $department)
            ->where('session_id', $session)
            ->where('semester_id', $semester)
            ->get(); 

  if($resultChk->count()>0){


    $examRecords= DB::table('exam_records')
    ->where('school_id', $school)
    ->where('level_id', $level)
    ->where('dept_id', $department)
    ->where('session_id', $session)
    ->orderBy('student_id')
    ->chunk(100, function($records){

foreach($records as $record){

    $results= DB::table('results')
    ->where('school_id', request()->input('school'))
    ->where('level_id', request()->input('level'))
    ->where('dept_id', request()->input('department'))
    ->where('session_id', request()->input('session'))
    ->where('exam_no', $record->exam_no)
    ->where('semester_id', request()->input('semester'))
    ->get(); 
   if($results->count()>0){

    $unit=$this->totalUnit($record->exam_no,request()->input('level'),request()->input('session'),request()->input('semester'),request()->input('school'),request()->input('department'));
   }



        }

     });


     return redirect('prep_sheet/'.request()->input('department').'/'.request()->input('school').'/'.request()->input('semester').'/'.request()->input('session').'/'.request()->input('level'));

        }else{



            return redirect()->back()->withErrors('This result is not available in the records');



        }
                 





           

         }



 }



 public function regenerate_result(){

    $validator=$this->validate(request(),[
        'school'=>'required|string',
        'department'=>'required|string',
        'level'=>'required|string',
        'session'=>'required|string',
        'semester'=>'required|string',
       
        ],
        [
         ]);

         if(count(request()->all()) > 0){

            $school = request()->input('school');
            $department= request()->input('department');
            $level= request()->input('level');
            $session= request()->input('session');
            $semester= request()->input('semester');



///////////////////////////////////////// empty all records ////////////////////////////////////////

       DB::table('total_unit')
    ->where('level_id', request()->input('level'))
    ->where('dept_id',request()->input('department'))
    ->where('school_id', request()->input('school'))
    ->where('session_id', request()->input('session'))
    ->where('semester_id', request()->input('semester'))
    ->delete();

    
    DB::table('grade_point')
    ->where('level_id', request()->input('level'))
    ->where('dept_id',request()->input('department'))
    ->where('school_id', request()->input('school'))
    ->where('session_id', request()->input('session'))
    ->where('semester_id', request()->input('semester'))
    ->delete();
	

    DB::table('total_grade_point')
    ->where('level_id', request()->input('level'))
    ->where('dept_id',request()->input('department'))
    ->where('school_id', request()->input('school'))
    ->where('session_id', request()->input('session'))
    ->where('semester_id', request()->input('semester'))
    ->delete();
	

    DB::table('studentgpa')
    ->where('level_id', request()->input('level'))
    ->where('dept_id',request()->input('department'))
    ->where('school_id', request()->input('school'))
    ->where('session_id', request()->input('session'))
    ->where('semester_id', request()->input('semester'))
    ->delete();

    

    DB::table('unitsandgradeproduct')
    ->where('level_id', request()->input('level'))
    ->where('dept_id',request()->input('department'))
    ->where('school_id', request()->input('school'))
    ->where('session_id', request()->input('session'))
    ->where('semester_id', request()->input('semester'))
    ->delete();
	
	
    DB::table('student_total_point')
    ->where('level_id', request()->input('level'))
    ->where('dept_id',request()->input('department'))
    ->where('school_id', request()->input('school'))
    ->where('session_id', request()->input('session'))
    ->where('semester_id', request()->input('semester'))
    ->delete();
	

    DB::table('tp_process')
    ->where('level_id', request()->input('level'))
    ->where('dept_id',request()->input('department'))
    ->where('school_id', request()->input('school'))
    ->where('session_id', request()->input('session'))
    ->where('semester_id', request()->input('semester'))
    ->delete();


          
////////////////////////////// check wether the result exist
            $resultChk= DB::table('results')
            ->where('school_id', $school)
            ->where('level_id', $level)
            ->where('dept_id', $department)
            ->where('session_id', $session)
            ->where('semester_id', $semester)
            ->get(); 

  if($resultChk->count()>0){


    $examRecords= DB::table('exam_records')
    ->where('school_id', $school)
    ->where('level_id', $level)
    ->where('dept_id', $department)
    ->where('session_id', $session)
    ->orderBy('student_id')
    ->chunk(100, function($records){

foreach($records as $record){

    $results= DB::table('results')
    ->where('school_id', request()->input('school'))
    ->where('level_id', request()->input('level'))
    ->where('dept_id', request()->input('department'))
    ->where('session_id', request()->input('session'))
    ->where('exam_no', $record->exam_no)
    ->where('semester_id', request()->input('semester'))
    ->get(); 
   if($results->count()>0){

    $unit=$this->totalUnit($record->exam_no,request()->input('level'),request()->input('session'),request()->input('semester'),request()->input('school'),request()->input('department'));
   }



        }

     });


     return redirect('prep_sheet/'.request()->input('department').'/'.request()->input('school').'/'.request()->input('semester').'/'.request()->input('session').'/'.request()->input('level'));

        }else{



            return redirect()->back()->withErrors('This result is not available in the records');



        }
                 





           

         }



 }


 public static function totalUnit($exam_no,$level,$session,$semester,$school,$department){


    $output="";
    $units= DB::table('results')->select(DB::raw('SUM(unit) as totUnit'))
    ->join('courses','courses.code','=','results.code') 
    ->where('results.session_id', $session)
    ->where('results.level_id', $level)
    ->where('results.dept_id', $department)
    ->where('results.semester_id', $semester)
    ->where('courses.dept_id', $department)
    ->where('courses.semester_id', $semester)
    ->where('courses.session_id', $session)
    ->where('results.exam_no', $exam_no)
    ->where('results.scores', '!=', 'ABS')
    ->get();

	foreach($units as $row){

     $unit= DB::table('total_unit')
    ->where('total_unit.school_id', $school)
    ->where('total_unit.session_id', $session)
    ->where('total_unit.level_id', $level)
    ->where('total_unit.dept_id', $department)
    ->where('total_unit.semester_id', $semester)
    ->where('total_unit.exam_no', $exam_no)
    ->get(); 	

 
 if($unit->count()==0){


    $total_unit = new total_unit();
    $total_unit->exam_no=$exam_no;
    $total_unit->unit=$row->totUnit;
    $total_unit->level_id=$level;
    $total_unit->semester_id=$semester;
    $total_unit->school_id=$school;
    $total_unit->dept_id=$department;
    $total_unit->session_id=$session;
    $total_unit->save();
		
		//$sqlx ="INSERT INTO total_unit (exam_no, unit,level,semester,school,department,session ) VALUES ('".$exam_no."','".$row['totUnit']."','".$level."','".$semester."','".$school."','".$department."','".$session."')";
       // $this->insertion($sqlx);
		
 }
	}


 }


 public static function pull_department(){
    $output="";
    $departments= DB::table('departments')->get(); 
        
    foreach($departments as $department){
    
        $output.="<option value=".$department->dept_id.">".$department->department."</option>";
    
    }


            return $output;
}


 public function post_student(){

    $validator=$this->validate(request(),[
        'name'=>'required|string',
        'school'=>'required|string',
        'department'=>'required|string',
        'exam_no'=>'required|string',
        'level'=>'required|string',
        'session'=>'required|string',
       
        ],
        [
         ]);

         if(count(request()->all()) > 0){

           
            $name = request()->input('name');
            $school= request()->input('school');
            $department= request()->input('department');
            $exam_no= request()->input('exam_no');
            $level= request()->input('level');
            $session= request()->input('session');

             //////////// create data //////////////////////

             $students = new students();
             $students->exam_no=$exam_no;
             $students->name=$name;
             $students->level_id=$level;
             $students->dept_id=$department;
             $students->school_id=$school;
             $students->session_id=$session;
             
             if($students->save()){

                return redirect()->back()->withSuccess('student uploaded succesfully');

             }

            

           
           

         }



 }


 

 public function add_sessions(){

    $validator=$this->validate(request(),[
        'session'=>'required|string',
        
        
       
        ],
        [

            'session.required'=>'Enter session ',
            
            
         ]);

         if(count(request()->all()) > 0){

           
            $session = request()->input('session');
            

             //////////// create data //////////////////////

             $school_sessions = new school_sessions();
             $school_sessions->session=request()->input('session');
             $school_sessions->created_at='';
             $school_sessions->updated_at='';
             if($school_sessions->save()){

                return redirect()->back()->withSuccess('one new school session added');

             }

            

           
           

         }



 }


 public function add_departments(){

    $validator=$this->validate(request(),[
        'school_name'=>'required|string',
        'department'=>'required|string',
        
       
        ],
        [

            'school_name.required'=>'Please choose school ',
            'department.required'=>'Please enter department',
            
         ]);

         if(count(request()->all()) > 0){

           
            $name = request()->input('school_name');
            

             //////////// create data //////////////////////

             $departments = new departments();
             $departments->department= request()->input('department') ;
             $departments->school_id= request()->input('school_name') ;
             $departments->created_at='';
             $departments->updated_at='';
            
             
             if( $departments->save()){

                return redirect()->back()->withSuccess('one new department added');

             }

            

           
           

         }



 }



 public function add_grade(){

    $validator=$this->validate(request(),[
        'g_serial'=>'required|string',
        'g_point'=>'required|string',
        'g_weight'=>'required|string',
        'g_grade'=>'required|string',
        
       
        ],
        [

            'g_serial.required'=>'Please enter grade serial ',
            'g_point.required'=>'Please enter grade point',
            'g_weight.required'=>'Please enter grade weight',
            'g_grade.required'=>'Please enter grade',
            
         ]);

         if(count(request()->all()) > 0){


             //////////// create data //////////////////////

             $grade = new grades();
             $grade->g_serial= request()->input('g_serial') ;
             $grade->g_point= request()->input('g_point') ;
             $grade->g_weight= request()->input('g_weight') ;
             $grade->grade= request()->input('g_grade') ;
             $grade->created_at='';
             $grade->updated_at='';
            
             
             if($grade->save()){

                return redirect()->back()->withSuccess('one new grade added');

             }

            

           
           

         }



 }



 public function add_users(){

    $validator=$this->validate(request(),[
        'name'=>'required|string',
        'email'=>'required|string',
        'password'=>'required|string',
        'actype'=>'required|string',
        'cpass'=>'required|string',
        
       
        ],
        [

            'name.required'=>'Please enter username ',
            'email.required'=>'Please enter email',
            'password.required'=>'Please enter password',
            'cpass.required'=>'Please enter conrfirm password',
            'actype.required'=>'Please enter grade',
            
         ]);

         if(count(request()->all()) > 0){


             //////////// create data //////////////////////

             $grade = new grades();
             $grade->g_serial= request()->input('g_serial') ;
             $grade->g_point= request()->input('g_point') ;
             $grade->g_weight= request()->input('g_weight') ;
             $grade->grade= request()->input('g_grade') ;
             $grade->created_at='';
             $grade->updated_at='';
            
             
             if($grade->save()){

                return redirect()->back()->withSuccess('one new grade added');

             }

            

           
           

         }



 }

 public function add_course(){

    $validator=$this->validate(request(),[
        'department'=>'required|string',
        'code'=>'required|string',
        'title'=>'required|string',
        'unit'=>'required|string',
        'level'=>'required|string',
        'session'=>'required|string',
        'semester'=>'required|string',
        
       
        ],
        [

            'department.required'=>'Choose department ',
            'code.required'=>'Choose code',
            'title.required'=>'Choose code',
            'unit.required'=>'Choose unit',
            'level.required'=>'Choose level',
            'session.required'=>'Choose session',
            'semester.required'=>'Choose semester',
            
         ]);

         if(count(request()->all()) > 0){

           
             //////////// create data //////////////////////

             $course = new courses();
             $course->school_department= request()->input('department') ;
             $course->code= request()->input('code') ;
             $course->title= request()->input('title') ;
             $course->unit= request()->input('unit') ;
             $course->school_level= request()->input('level') ;
             $course->school_session= request()->input('session') ;
             $course->school_semester= request()->input('semester') ;
             $course->created_at='';
             $course->updated_at='';
             
             if($course->save()){


                return redirect()->back()->withSuccess('one new department added');

             }

            

           
           

         }



 }


 public function add_level(){

    $validator=$this->validate(request(),[
        'level_name'=>'required|string',
        
       
        ],
        [

            'level_name.required'=>'Enter level ',
            
         ]);

         if(count(request()->all()) > 0){

           
            $name = request()->input('level_name');
            

             //////////// create data //////////////////////

             $levels = new level();
             $levels->level= $name ;
             
            
             
             if($levels->save()){

                return redirect()->back()->withSuccess('one new level added');

             }

            

           
           

         }



 }


 public function add_school(){

    $validator=$this->validate(request(),[
        'school_name'=>'required|string',
        
       
        ],
        [

            'school_name.required'=>'Enter school ',
            
         ]);

         if(count(request()->all()) > 0){

           
            $name = request()->input('school_name');
            

             //////////// create data //////////////////////

             $schools = new schools();
             $schools->school= $name ;
             $schools->created_at='';
             $schools->updated_at='';
            
             
             if($schools->save()){

                return redirect()->back()->withSuccess('one new school added');

             }

            

           
           

         }



 }
 

public static function pull_level(){


    $output="";

    $sessions= DB::table('levels')->get(); 
	
	foreach($sessions as $row){
			
		$output.='<option value="'.$row->level_id.'">'. $row->level.'</option>';	
	}
	return $output;



}



public static function pull_semester(){


    $output="";

    $semesters= DB::table('semester')->get(); 
	
	foreach($semesters as $row){
			
		$output.='<option value="'.$row->semester_id.'">'. $row->semester.'</option>';	
	}
	return $output;



}

public function bulk_upload_student(){

    return view('bulk_upload_student');

}




public function update_events(){

    $validator=$this->validate(request(),[
        'activity'=>'required|string',
        'attend'=>'required|string',
        'time'=>'required|string',
        'timezone'=>'required|string', 
        'venue'=>'required|string',      
        ],
        [
            
            
            
            ]);


         if(count(request()->all()) > 0){

           
           
            
            DB::table('programs')->where('id', request()->input('eventid'))->update(['activity' =>request()->input('activity'), 'attend' => request()->input('attend'),'venue' => request()->input('venue'),'time' => request()->input('time'),'timezone' => request()->input('timezone')]);
             
               
            return redirect()->back()->withSuccess('Event record updated sucessfully');   

                    
           
           
           

         }




}



public function post_invest(){

    $validator=$this->validate(request(),[
        'title'=>'required|string',
        'description'=>'required|string',
        'effect'=>'required|string',
        'kind'=>'required|string',
        'sector'=>'required|string',
        'impact'=>'required|string',
       
              
        ],
        [
            'title.required'=>'Please type in the title of the programme ',
            'description.required'=>'Type in the description of the programme ',
            'effect.required'=>'enter beneficiaries of this programme',
            'kind.required'=>'Enter the type of social investment programme',
            
            'sector.required'=>'Enter the sector ',
           'impact.required'=>'What are the impact of the programme ',
           
            
            
            ]);

            if(count(request()->all()) > 0){

                $investments= new investments();
               
                $investments->title= request()->input('title');
                $investments->description= request()->input('description');
                $investments->people_affected= request()->input('effect');
                $investments->type_program= request()->input('kind');
                $investments->sector= request()->input('sector');
                $investments->sector= request()->input('category');
                $investments->estimated_impact= request()->input('impact');
                $investments->postedBy=auth()->user()->name;
                $investments->save();

                return redirect()->back()->withSuccess('New investment uploaded sucessffully');
                
                

            }




}


public function post_policies(){

    $validator=$this->validate(request(),[
        'title'=>'required|string',
        'description'=>'required|string',
        'date_passed'=>'required|string',
        'assembly_name'=>'required|string',
       
       
              
        ],
        [
            'title.required'=>'Please type in the title of the policies ',
            'description.required'=>'Type in the description of the policies ',
            'date_passed.required'=>'enter date the bill was passed',
            'assembly_name.required'=>'type in the name of the assembly',
            
        
            
            ]);

            if(count(request()->all()) > 0){

                $policies= new policies();
               
                $policies->title_of_bill= request()->input('title');
                $policies->description= request()->input('description');
                $policies->date_passed= request()->input('date_passed');
                $policies->assembly_name= request()->input('assembly_name');
                $policies->postedBy= auth()->user()->name;
                $policies->save();

                return redirect()->back()->withSuccess('New policy uploaded sucessffully');
                
                

            }




}





public function post_infra(){

    $validator=$this->validate(request(),[
        'title'=>'required|string',
        'description'=>'required|string',
        'location'=>'required|string',
        'lga'=>'required|string',
        'start'=>'required|string',
        'end'=>'required|string',
        'amount'=>'required|string',
        'contractor'=>'required|string',
        'partnership'=>'required|string',
        'benefits'=>'required|string',
              
        ],
        [
            'title.required'=>'Please type in the title of the project ',
            'description.required'=>'Type in the description of the project ',
            'lga.required'=>'Choose lga where project is sited',
            'location.required'=>'Please type in where project is sited',
            
            'start.required'=>'Enter the start time of project ',
           'end.required'=>'Enter end time of project ',
           'amount.required'=>'Type in the amount of the project ',
           'contractor.required'=>'Enter name of contractor',
           'partnership.required'=>'list partnership if exist ',
           'benefits.required'=>'Please state the proposed benefits of project ',
            
            
            ]);

            if(count(request()->all()) > 0){

                $infrastructure = new infrastructure();
                $infrastructure->code= request()->input('code');
                $infrastructure->project_area= request()->input('area');
                $infrastructure->project_status= request()->input('status');
                $infrastructure->title= request()->input('title');
                $infrastructure->description= request()->input('description');
                $infrastructure->location= request()->input('location');
                $infrastructure->lga= request()->input('lga');
                $infrastructure->start_time= request()->input('start');
                $infrastructure->proposed_endtime= request()->input('end');
                $infrastructure->amount= request()->input('amount');
                $infrastructure->contractor= request()->input('contractor');
                $infrastructure->partnership= request()->input('partnership');
                $infrastructure->benefits= request()->input('benefits');
                $infrastructure->postedBy= auth()->user()->name;
                $infrastructure->save();

                return redirect()->back()->withSuccess('New infrastructure uploaded sucessffully');
                
                

            }




}




public function exams_records(){

    $validator=$this->validate(request(),[
        'school'=>'required|string',
        'department'=>'required|string',
        'level'=>'required|string',
        'session'=>'required|string',
        'file' => 'required|mimes:csv,txt',        
        ],
        [
            'school.required'=>'Please choose school ',
            'department.required'=>'Please choose students department ',
            'level.required'=>'Please choose student level  ',
            'session.required'=>'Choose session ',
           'file.required'=>'Please Upload excel file of csv format ',
            
            
            ]);


         if(count(request()->all()) > 0){

           
           
            $school= request()->input('school');
            $department= request()->input('department');
            $level= request()->input('level');
            $session= request()->input('session');
            

             //////////// create data //////////////////////

            

             Excel::import(new ExcelexamrecordsImport($school,$department,$level,$session), request()->file('file'));
           

             return redirect()->back()->withSuccess('Student record uploaded sucessfully');
           
           

         }




}






public function allspeech(){

    $speech= DB::table('programs')
    ->select('programs.id','programs.activity','programs.created_at','programs.venue','programs.attend','speech.content','speech.postedBy','speech.eventID','speech.status' ,'speech.title')
    ->join('speech','speech.eventID','=','programs.id')
    ->get();
    

    $speech2= DB::table('speech')->where(['status' =>0])
    ->get();

   
   return view('all-speeches',['speeches'=>$speech,'speeches2'=>$speech2]);

}


public function allvideo(){

    $video= DB::table('programs')
    ->select('programs.id','programs.activity','programs.created_at','programs.venue','programs.attend','programs.postedBy','videos.url')
    ->join('videos','videos.eventID','=','programs.id')
    ->get();

   
   return view('all-videos',['videos'=>$video]);

}



public function allaudio(){

    $audio= DB::table('programs')
    ->select('programs.id','programs.activity','programs.created_at','programs.venue','programs.attend','programs.postedBy','audios.url')
    ->join('audios','audios.eventID','=','programs.id')
    ->get();

   
   return view('all-audios',['audios'=>$audio]);

}


public function event_media($id){

    $speechxa=DB::table('speech')->where('eventID', $id)->first();
    $ids=DB::table('programs')->where('id', $id)->first();
   // $speechxa=DB::table('speech')->where('eventID', $id)->first();
    $speech=DB::table('speech')->where('eventID', $id)->get(); 
    $audio=DB::table('audios')->where('eventID', $id)->get(); 
    $photo=DB::table('photos')->where('eventID', $id)->paginate(4); 
    $video=DB::table('videos')->where('eventID', $id)->get(); 
    $speechfile=DB::table('speech_file')->where('eventID', $id)->get(); 

   return view('event',['speechx'=> $speechxa,'program'=>$ids,'speeches'=>$speech,'audios'=>$audio,'photos'=>$photo,'videos'=>$video,'speechfiles'=>$speechfile]);

}

public function editevent($id){

    $ids=DB::table('speech')->where('eventID', $id)->first();
    $speech=DB::table('speech')->where('eventID', $id)->get(); 
    $speechfile=DB::table('speech_file')->where('eventID', $id)->get(); 
    return view('event-edit',['program'=>$ids,'speeches'=>$speech,'speechfiles'=>$speechfile]);



}


public function all_photos($id){

    $photo=DB::table('photos')->where('eventID', $id)->paginate(12);
    $program=DB::table('programs')->where('id', $id)->first();

   return view('all_photos',['photos'=>$photo,'programs'=>$program]);

}

public function addaudio($id){

    $validator=$this->validate(request(),[
       
        'file'=>'required|file:mp3,wav,MP3',
      
        ],
        [
            'file.required'=>'Please upload an audio file',
            
            ]);

            if(count(request()->all()) > 0){
     
        $audiofile= request()->file('file');
        $original_filename = strtolower(trim($audiofile->getClientOriginalName()));
        $fileName =  time().rand(100,999).$original_filename;
        $filePath = 'audios';
        $filePathdb = asset('/audios/'.$fileName);
        $audiofile->move($filePath,$fileName);

        $insquery="insert into audios (id,url,eventID) values(NULL,'". $filePathdb."','".$id."')";
        $insert = DB::insert($insquery);
    
       return redirect()->back()->withSuccess('Audio uploaded sucessfully');
    
    }



}



public function addvideo($id){

    $validator=$this->validate(request(),[
       
        'embed'=>'required|string',
      
        ],
        [
            'embed.required'=>'Please enter HTML embed video code',
            
            ]);

            if(count(request()->all()) > 0){
     
       

        $insquery="insert into videos (id,url,eventID) values(NULL,'". request()->input('embed')."','".$id."')";
        $insert = DB::insert($insquery);
    
       return redirect()->back()->withSuccess('Video embed code uploaded sucessfully');
    
    }



}






public function specialdocumentspost(){

    $validator=$this->validate(request(),[
        'title' => 'required|string',
        'description' => 'required|string',
        'file' => 'required|mimes:pdf,docx,doc',
      
        ],
        [
            'file.required'=>'Please upload a file',
            
            ]);

            if(count(request()->all()) > 0){
     
        $audiofile= request()->file('file');
        $original_filename = strtolower(trim($audiofile->getClientOriginalName()));
        $fileName =  time().rand(100,999).$original_filename;
        $filePath = 'specialdocs';
        $filePathdb = asset('/specialdocs/'.$fileName);
        $audiofile->move($filePath,$fileName);

        $insquery="insert into special_documents (id,title,description,filename,postBy,created_at) values(NULL,'".request()->input('title')."','".request()->input('description')."','". $filePathdb."','".auth()->user()->name."','".date('d/m/Y')."')";
        $insert = DB::insert($insquery);
    
       return redirect()->back()->withSuccess('Document  uploaded sucessfully');
    
    }



}







public function addphoto($id){

    $validator=$this->validate(request(),[
       
        'file'=>'required|mimes:jpeg,JPEG,png',
      
        ],
        [
            'file.required'=>'Please upload an image file',
            
            ]);

            if(count(request()->all()) > 0){
     
        $audiofile= request()->file('file');
        $original_filename = strtolower(trim($audiofile->getClientOriginalName()));
        $fileName =  time().rand(100,999).$original_filename;
        $filePath = 'photos';
        $filePathdb = asset('/photos/'.$fileName);
        $audiofile->move($filePath,$fileName);

        $insquery="insert into photos (id,url,eventID,caption) values(NULL,'". $filePathdb."','".$id."','". request()->input('caption')."')";
        $insert = DB::insert($insquery);
    
       return redirect()->back()->withSuccess('Photo uploaded sucessfully');
    
    }



}





public function addinfraphoto($id){

    $validator=$this->validate(request(),[
       
        'file'=>'required|mimes:jpeg,JPEG,png',
      
        ],
        [
            'file.required'=>'Please upload an image file',
            
            ]);

            if(count(request()->all()) > 0){
     
        $audiofile= request()->file('file');
        $original_filename = strtolower(trim($audiofile->getClientOriginalName()));
        $fileName =  time().rand(100,999).$original_filename;
        $filePath = 'infraphotos';
        $filePathdb = asset('/infraphotos/'.$fileName);
        $audiofile->move($filePath,$fileName);

        $insquery="insert into infra_photos (id,img,infra_id) values(NULL,'". $filePathdb."','".$id."')";
        $insert = DB::insert($insquery);
    
       return redirect()->back()->withSuccess('Photo uploaded sucessfully');
    
    }



}


public function addinvestphoto($id){

    $validator=$this->validate(request(),[
       
        'file'=>'required|mimes:jpeg,JPEG,png',
      
        ],
        [
            'file.required'=>'Please upload an image file',
            
            ]);

            if(count(request()->all()) > 0){
     
        $audiofile= request()->file('file');
        $original_filename = strtolower(trim($audiofile->getClientOriginalName()));
        $fileName =  time().rand(100,999).$original_filename;
        $filePath = 'investphotos';
        $filePathdb = asset('/investphotos/'.$fileName);
        $audiofile->move($filePath,$fileName);

        $insquery="insert into invest_photos (id,img,invest_id) values(NULL,'". $filePathdb."','".$id."')";
        $insert = DB::insert($insquery);
    
       return redirect()->back()->withSuccess('Photo uploaded sucessfully');
    
    }



}






public function addfile($id){

    $validator=$this->validate(request(),[
       
        'file' => 'required|mimes:pdf,docx,doc',
      
        ],
        [
            'file.required'=>'Please upload a file',
            
            ]);

            if(count(request()->all()) > 0){
     
        $audiofile= request()->file('file');
        $original_filename = strtolower(trim($audiofile->getClientOriginalName()));
        $fileName =  time().rand(100,999).$original_filename;
        $filePath = 'allspeeches';
        $filePathdb = asset('/allspeeches/'.$fileName);
        $audiofile->move($filePath,$fileName);

        $insquery="insert into speech_file (id,url,eventID) values(NULL,'". $filePathdb."','".$id."')";
        $insert = DB::insert($insquery);
    
       return redirect()->back()->withSuccess('Document format of speech uploaded sucessfully');
    
    }



}





public function add_results_csv(){

    $validator=$this->validate(request(),[
        'school'=>'required|string',
        'department'=>'required|string',
        'level'=>'required|string',
        'session'=>'required|string',
        'semester'=>'required|string',
        'file' => 'required|mimes:csv,txt',        
        ],
        [
            'school.required'=>'Please choose school ',
            'department.required'=>'Please choose students department ',
            'level.required'=>'Please choose student level  ',
            'session.required'=>'Choose session ',
            'semester.required'=>'Choose semester ',
           'file.required'=>'Please Upload excel file of csv format ',
            
            
            ]);


         if(count(request()->all()) > 0){

           
           
            $school= request()->input('school');
            $department= request()->input('department');
            $level= request()->input('level');
            $session= request()->input('session');
            $semester= request()->input('semester');
            

             //////////// create data //////////////////////

            

             Excel::import(new resultsupload($school,$department,$level,$session,$semester), request()->file('file'));
           

             return redirect()->back()->withSuccess('Results uploaded sucessfully');
           
           

         }




}



public function student_delete($id)
    
    {
        $student = DB::delete('delete from exam_records where student_id='.$id);
       
        $deleted_message = "one record deleted succesfuly";

        return redirect()->back()->withSuccess('Student uploaded succesfully');
   
       
    }

   public function delete_user($id){

    $student = DB::delete('delete from account where account_id='.$id);
    return redirect()->back()->withSuccess('User deleted succesfully');

   }

   public function delete_users($id){

    $student = DB::delete('delete from users where id='.$id);
    return redirect()->back()->withSuccess('Users deleted succesfully');

   }

        
    public function delete_departments($id)
    
    {
        $student = DB::delete('delete from departments where dept_id='.$id);
       
            return redirect()->back()->withSuccess('Department deleted succesfully');
   
       
    }

    public function delete_course($id)
    
    {
        $student = DB::delete('delete from courses where course_id='.$id);
       
            return redirect()->back()->withSuccess('Course deleted succesfully');
   
       
    }

    public function delete_sessions($id)
    
    {
        $student = DB::delete('delete from school_sessions where session_id='.$id);
       
            return redirect()->back()->withSuccess('session deleted succesfully');
   
       
    }

    public function delete_grade($id)
    
    {
        $student = DB::delete('delete from grades where grade_id='.$id);
       
            return redirect()->back()->withSuccess('grade deleted succesfully');
   
       
    }


    public function school_delete($id)
    
    {
        $student = DB::delete('delete from schools where school_id='.$id);
       
            return redirect()->back()->withSuccess('School deleted succesfully');
   
       
    }


    public function report_process(){

        $tpprocess= DB::table('tp_process')->get();

        return view('process_report',['processes'=>$tpprocess]);

    }


    public function level_delete($id)
    
    {
        $level = DB::delete('delete from levels where level_id='.$id);
       
            return redirect()->back()->withSuccess('level deleted succesfully');
   
       
    }


    public function event_delete($id)
    
    {
        $level = DB::delete('delete from programs where id='.$id);
        $level = DB::delete('delete from speech where eventID='.$id);
       
            return redirect()->back()->withSuccess('Event record deleted successfully');
   
       
    }

    public function speech_delete($id)
    
    {
        $level = DB::delete('delete from speech where id='.$id);
       
            return redirect()->back()->withSuccess('Speech has been deleted successfully');
   
       
    }

    public function video_delete($id)
    
    {
        $level = DB::delete('delete from videos where id='.$id);
       
            return redirect()->back()->withSuccess('Video embed code for this event has beed deleted successfully');
   
       
    }

    public function audio_delete($id)
    
    {
        $file= DB::table('audios')->where('id',$id)->first(); 

        if(file_exists(public_path('audios/'.basename($file->url)))){
 
            unlink(public_path('audios/'.basename($file->url)));
      
          }



        $level = DB::delete('delete from audios where id='.$id);
       
            return redirect()->back()->withSuccess('Audio has been deleted successfully');
   
       
    }


    public function file_delete($id)
    
    {

        $file= DB::table('speech_file')->where('id',$id)->first(); 

        if(file_exists(public_path('allspeeches/'.basename($file->url)))){
 
            unlink(public_path('allspeeches/'.basename($file->url)));
      
          }


        $level = DB::delete('delete from speech_file where id='.$id);
       
            return redirect()->back()->withSuccess('File format of this speech has been deleted successfully');
   
       
    }


    public function photo_delete($id)
    
    {

        $file= DB::table('photos')->where('id',$id)->first(); 

        if(file_exists(public_path('photos/'.basename($file->url)))){
 
            unlink(public_path('photos/'.basename($file->url)));
      
          }

        $level = DB::delete('delete from photos where id='.$id);
       
            return redirect()->back()->withSuccess('Photo has been deleted successfully');
   
       
    }

    public function infraphoto_delete($id)
    
    {

        $file= DB::table('infra_photos')->where('id',$id)->first(); 

        if(file_exists(public_path('infraphotos/'.basename($file->img)))){
 
            unlink(public_path('infraphotos/'.basename($file->img)));
      
          }

        $level = DB::delete('delete from infra_photos where id='.$id);
       
            return redirect()->back()->withSuccess('Photo has been deleted successfully');
   
       
    }


    public function investphoto_delete($id)
    
    {

        $file= DB::table('invest_photos')->where('id',$id)->first(); 

        if(file_exists(public_path('investphotos/'.basename($file->img)))){
 
            unlink(public_path('investphotos/'.basename($file->img)));
      
          }

        $level = DB::delete('delete from invest_photos where id='.$id);
       
            return redirect()->back()->withSuccess('Photo has been deleted successfully');
   
       
    }


    public static function pullphoto($id)
 {
    
    $detail= DB::table('photos')->where('id', $id)->first(); 
    return response()->json($detail);
        
   
 }

 public static function pullinfraphoto($id)
 {
    
    $detail= DB::table('infra_photos')->where('id', $id)->first(); 
    return response()->json($detail);
        
   
 }

 public static function pullinvestphoto($id)
 {
    
    $detail= DB::table('invest_photos')->where('id', $id)->first(); 
    return response()->json($detail);
        
   
 }


}
