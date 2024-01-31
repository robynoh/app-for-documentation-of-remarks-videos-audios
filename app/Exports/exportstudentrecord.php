<?php

namespace App\Exports;
use DB;

use Maatwebsite\Excel\Concerns\FromCollection;

class exportstudentrecord implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function  __construct($school,$department,$level,$session)
    {
        $this->school= $school;
        $this->department= $department;
        $this->level= $level;
        $this->session= $session;
    }
    public function collection()
    {
        //

       return  $students= DB::table('exam_records')
        ->select('exam_records.exam_no','exam_records.name','levels.level','schools.school','school_sessions.session','departments.department')
        ->join('departments','departments.dept_id','=','exam_records.dept_id')
        ->join('schools','schools.school_id','=','exam_records.school_id')
        ->join('levels','levels.level_id','=','exam_records.level_id')
        ->join('school_sessions','school_sessions.session_id','=','exam_records.session_id')
        ->where('exam_records.session_id', $this->session)
        ->where('exam_records.dept_id', $this->department)
        ->where('exam_records.level_id', $this->level)
        ->where('exam_records.school_id', $this->school)
        ->get();
        

       

    }

    public function map($row): array{
        $fields = [
         'name'=>$row->name,
         'exam_no'=> $row->exam_no,
         'school'=> $row->school,
         'department'=> $row->department,
         'session'=> $row->session,
      ];
     return fields;
 }


}
