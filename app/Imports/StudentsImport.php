<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Student([
            'matric_no'    => $row['matric_no'],
            'jamb_reg'      => $row['jamb_reg'],
            'form_no'      => $row['form_no'],
            'first_name'   => $row['first_name'],
            'other_names'  => $row['other_names'],
            'faculty'      => $row['faculty'],
            'department'   => $row['department'],
            'level'        => $row['level'],
        ]);
    }
}

