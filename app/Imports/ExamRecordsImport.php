<?php

namespace App\Imports;

use App\models\exams_record;
use Maatwebsite\Excel\Concerns\ToModel;

class ExamRecordsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new exams_record([
            //
        ]);
    }
}
