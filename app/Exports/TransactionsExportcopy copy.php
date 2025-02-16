<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class TransactionsExportcopxy implements FromCollection, WithHeadings, WithDrawings
{
    protected $studentLevel;
    protected $studentDept;

    public function __construct($studentLevel, $studentDept)
    {
        $this->studentLevel = $studentLevel;
        $this->studentDept = $studentDept;
    }

    public function collection()
    {
        
        $transactions = Transaction::with(['student' => function ($query) {
            $query->select('id', 'name', 'matric_no', 'form_no', 'department');
        }])
        ->select('id', 'student_id', 'amount');

        dd($transactions);

        if ($this->studentLevel && $this->studentLevel !== 'all') {
            $transactions->whereHas('student', function ($query) {
                $query->where('level', $this->studentLevel);
            });
        }

        if ($this->studentDept && $this->studentDept !== 'all') {
            $transactions->whereHas('student', function ($query) {
                $query->where('department', $this->studentDept);
            });
        }

        return $transactions->get()->map(function ($transaction) {
            return [
                'Name' => $transaction->student->name,
                'Matric/Form No' => $transaction->student->matric_no ?? $transaction->student->form_no,
                'Department' => $transaction->student->department,
                'Amount' => $transaction->amount,
            ];
        });
    }

    public function headings(): array
    {
        return ['Name', 'Matric/Form No', 'Department', 'Amount'];
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('PayUrDues');
        $drawing->setDescription('Brand Logo');
        $drawing->setPath(public_path('\assets\img\svg\logo.svg')); // Ensure you have a logo.png in the public folder
        $drawing->setHeight(50);
        $drawing->setCoordinates('A1'); // Position at the top corner

        return $drawing;
    }
}
