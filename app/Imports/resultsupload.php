<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;

class resultsupload implements ToCollection, WithStartRow
{
    /**
    * @param Collection $collection
    */


    public function  __construct($school,$department,$level,$session,$semester)
    {
        $this->school= $school;
        $this->department= $department;
        $this->level= $level;
        $this->session= $session;
        $this->semester= $semester;
    }

    public function startRow(): int
    {
        return 2;
    }
    public function collection(Collection $collection)
    {
        //


        foreach($collection as $row){

            

            DB::table('results')->insert(['exam_no'=>$row[0],'scores'=>$row[1],
           'code'=>$row[2],'dept_id'=>$this->department,'school_id'=>$this->school,
          'level_id'=>$this->level,'session_id'=>$this->session,'semester_id'=>$this->semester,'updated_at'=>'','created_at'=>'']);


        }
    }
}
