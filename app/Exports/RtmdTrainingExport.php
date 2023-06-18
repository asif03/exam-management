<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RtmdTrainingExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = DB::table('rtmd_training_workshops')
            ->join('subjects', 'subjects.id', '=', 'rtmd_training_workshops.subject_id')
            ->where('rtmd_training_workshops.active', true)
            ->select(
                'rtmd_training_workshops.fellow_id',
                'rtmd_training_workshops.candidate_name',
                'subjects.subject_name',
                'rtmd_training_workshops.mobile',
                'rtmd_training_workshops.email',
                'rtmd_training_workshops.bank_name',
                'rtmd_training_workshops.bank_branch',
                'rtmd_training_workshops.money_receipt',
                'rtmd_training_workshops.reg_fee')
            ->orderBy('rtmd_training_workshops.fellow_id', 'ASC')
            ->get();

        return $data;
    }

    public function headings(): array
    {
        return [
            'Fellow ID',
            'Name',
            'Subject',
            'Mobile',
            'Email',
            'Bank Name',
            'Branch Name',
            'Money Receipt No.',
            'Reg. Fee',
        ];
    }
}
