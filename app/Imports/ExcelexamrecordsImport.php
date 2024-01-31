<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\models\students;
use DB;

class ExcelexamrecordsImport implements ToCollection, WithStartRow{
    /**
    * @param Collection $collection
    */

    public function  __construct($school,$department,$level,$session)
    {
        $this->school= $school;
        $this->department= $department;
        $this->level= $level;
        $this->session= $session;
    }

    public function startRow(): int
    {
        return 2;
    }
    public function collection(Collection $collection)
    {
        // 
        
     

        foreach($collection as $row){

            

            DB::table('exam_records')->insert(['exam_no'=>$row[0],'name'=>$row[1],
           'level_id'=>$this->level,'dept_id'=>$this->department,'school_id'=>$this->school,
          'session_id'=>$this->session,'updated_at'=>'','created_at'=>'']);


        }
    }
}
