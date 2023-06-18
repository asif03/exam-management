<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class BcpsGoldenJubileeExport implements FromCollection, WithHeadings, WithEvents
{

    // public function __construct($exam_year, $exam_session, $subject_id)
    // {
    //     $this->examYear = $exam_year;
    //     $this->examSession = $exam_session;
    //     $this->subjectId = $subject_id;
    // }

    public function collection()
    {
            return $data = DB::table('bcps_golden_jubilee_guests')
                ->join('subjects', 'subjects.id', '=', 'bcps_golden_jubilee_guests.subject_id')
                ->select('bcps_golden_jubilee_guests.mem_fellow_radio',
                    'bcps_golden_jubilee_guests.fellow_id',
                    'bcps_golden_jubilee_guests.candidate_name',
                    'bcps_golden_jubilee_guests.profession',
                    'bcps_golden_jubilee_guests.institute',
                    'bcps_golden_jubilee_guests.department',
                    'subjects.subject_name',
                    'bcps_golden_jubilee_guests.mobile',
                    'bcps_golden_jubilee_guests.email',
                    DB::raw('(CASE WHEN bcps_golden_jubilee_guests.is_spouse_chk = 1 THEN "Yes" ELSE "No" END) AS is_spouse_chk'),
                    DB::raw('(CASE WHEN bcps_golden_jubilee_guests.payment_mode = 1 THEN "Online" ELSE "Cash" END) AS payment_mode'),
                    'bcps_golden_jubilee_guests.bank_branch',
                    'bcps_golden_jubilee_guests.reg_fee',
                    'bcps_golden_jubilee_guests.verified',
                    'bcps_golden_jubilee_guests.money_receipt',
                    'bcps_golden_jubilee_guests.created_at')
                ->get();
    }

    public function headings(): array
    {
        return [
            'FCPS/MCPS',
            'Fellow Id',
            'Name',
            'Profession',
            'Institute',
            'Department',
            'Subject',
            'Mobile',
            'Email',
            'spouse?',
            'Payment Mode',
            'Bank Branch',
            'Registration Fee',
            'Verified?',
            'Money Receipt',
            'Time Of Creation',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:P1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFF16F42');
            },
        ];
    }
}