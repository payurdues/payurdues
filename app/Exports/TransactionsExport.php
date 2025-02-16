<?php


namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionsExport implements FromCollection, WithHeadings
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
        $query = Transaction::with('student');

        if ($this->studentLevel && $this->studentLevel !== 'all') {
            $query->whereHas('student', function ($q) {
                $q->where('level', $this->studentLevel);
            });
        }

        if ($this->studentDept && $this->studentDept !== 'all') {
            $query->whereHas('student', function ($q) {
                $q->where('department', $this->studentDept);
            });
        }

        return $query->get(['name', 'matric_no', 'form_no', 'amount']);
    }

    public function headings(): array
    {
        return ['Name', 'Matric No', 'Form No', 'Amount'];
    }
}
