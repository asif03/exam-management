<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class BriefingProgramExport implements FromCollection, WithHeadings, WithEvents
{

    public function collection()
    {
            return $data = DB::table('briefing_programs')
                ->join('subjects', 'subjects.id', '=', 'briefing_programs.subject_id')
                ->select('briefing_programs.candidate_name',
                    'briefing_programs.mailing_addr',
                    'briefing_programs.exam_session',
                    'subjects.subject_name',
                    'briefing_programs.mobile',
                    'briefing_programs.email',
                    'briefing_programs.created_at')
                ->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Address',
            'Session',
            'Subject',
            'Mobile',
            'Email',
            'Time Of Creation',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:G1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFF16F42');
            },
        ];
    }
}