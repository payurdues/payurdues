<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class TransactionsExportcopy implements FromCollection, WithHeadings, WithDrawings
{
    protected $transactions;

    public function __construct($transactions)
    {
        $this->transactions = $transactions;
    }

    public function collection()
    {
        return $this->transactions->map(function ($transaction) {
            return [
                'Name' => $transaction->student->first_name." ".$transaction->student->other_names ?? 'N/A',
                'Matric/Form No' => $transaction->student->matric_no ?? $transaction->student->form_no ?? 'N/A',
                'Department' => $transaction->student->department ?? 'N/A',
                'Amount' => number_format($transaction->final_amount, 2),
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

        // Ensure the image is in PNG/JPG format
        $logoPath = public_path('assets/img/logo.png'); // Use a valid path

        if (file_exists($logoPath)) {
            $drawing->setPath($logoPath);
            $drawing->setHeight(50);
            $drawing->setCoordinates('A1');
            return [$drawing]; // Must return an array
        }

        return [];
    }

}
