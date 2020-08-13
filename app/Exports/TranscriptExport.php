<?php


namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TranscriptExport implements FromArray, WithHeadings
{
    protected $reports;
    public function headings(): array
    {
        return [
            'Media type',
            'Transcript or Text',
            'Submission Date',
            'submission file name/id',
        ];
    }
    public function __construct(array $reports)
    {
        $this->reports = $reports;
    }

    public function array(): array
    {
        return $this->reports;
    }
}
