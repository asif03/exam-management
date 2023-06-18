<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class ExamInfoUpdateExport implements FromCollection, WithHeadings, WithEvents
{

    public function __construct($exam_year, $exam_session, $subject_id)
    {
        $this->examYear = $exam_year;
        $this->examSession = $exam_session;
        $this->subjectId = $subject_id;
    }

    /**
     * @return \Illuminate\Support\Collection
     * https://www.schemecolor.com/sample?getcolor=55FFC1
     * https://phpspreadsheet.readthedocs.io/en/latest/topics/recipes/#styles
     * https://phpoffice.github.io/PhpSpreadsheet/classes/PhpOffice-PhpSpreadsheet-Style-Color.html#constant_VALIDATE_ARGB_SIZE
     */
    public function collection()
    {
        if ($this->subjectId == -1) {

            return $data = DB::table('exam_info_updates')
                ->join('subjects', 'subjects.id', '=', 'exam_info_updates.subject_id')
                ->join('training_institutes as ti0', 'ti0.id', '=', 'exam_info_updates.training_institute_id')
                ->join('training_institutes as ti1', 'ti1.id', '=', 'exam_info_updates.course_institute_id')
                ->join('training_institutes as ti2', 'ti2.id', '=', 'exam_info_updates.present_posting')
                ->select(
                    'exam_info_updates.roll_no',
                    'exam_info_updates.candidate_name',
                    DB::raw('(CASE WHEN exam_info_updates.training_institute_id = 9999 THEN exam_info_updates.other_training_institute_name ELSE ti0.institute_name END) AS training_inst2'),
                    'exam_info_updates.trainer_name',
                    DB::raw('(CASE WHEN exam_info_updates.course_institute_id = 9999 THEN exam_info_updates.other_course_institute_name ELSE ti1.institute_name END) AS course_inst2'),
                    'exam_info_updates.course_director',
                    'ti2.institute_name as present_posting',
                    'exam_info_updates.institute_head',
                    'exam_info_updates.bmdc_reg_no',
                    'subjects.subject_name',
                    'exam_info_updates.exam_year',
                    'exam_info_updates.exam_session',
                    'exam_info_updates.course_year',
                    'exam_info_updates.mobile',
                )
                ->where('exam_info_updates.exam_year', '=', $this->examYear)
                ->where('exam_info_updates.exam_session', '=', $this->examSession)
                ->orderBy('exam_year', 'ASC')
                ->get();
        } else {
            return $data = DB::table('exam_info_updates')
                ->join('subjects', 'subjects.id', '=', 'exam_info_updates.subject_id')
                ->join('training_institutes as ti0', 'ti0.id', '=', 'exam_info_updates.training_institute_id')
                ->join('training_institutes as ti1', 'ti1.id', '=', 'exam_info_updates.course_institute_id')
                ->join('training_institutes as ti2', 'ti2.id', '=', 'exam_info_updates.present_posting')
                ->select(
                    'exam_info_updates.roll_no',
                    'exam_info_updates.candidate_name',
                    DB::raw('(CASE WHEN exam_info_updates.training_institute_id = 9999 THEN exam_info_updates.other_training_institute_name ELSE ti0.institute_name END) AS training_inst2'),
                    'exam_info_updates.trainer_name',
                    DB::raw('(CASE WHEN exam_info_updates.course_institute_id = 9999 THEN exam_info_updates.other_course_institute_name ELSE ti1.institute_name END) AS course_inst2'),
                    'exam_info_updates.course_director',
                    'ti2.institute_name as present_posting',
                    'exam_info_updates.institute_head',
                    'exam_info_updates.bmdc_reg_no',
                    'subjects.subject_name',
                    'exam_info_updates.exam_year',
                    'exam_info_updates.exam_session',
                    'exam_info_updates.course_year',
                    'exam_info_updates.mobile',
                )
                ->where('exam_info_updates.exam_year', '=', $this->examYear)
                ->where('exam_info_updates.exam_session', '=', $this->examSession)
                ->where('exam_info_updates.subject_id', '=', $this->subjectId)
                ->orderBy('exam_year', 'ASC')
                ->get();
        }

    }

    public function headings(): array
    {
        return [
            'Roll',
            'Name of Candidate',
            'Last Training Institute',
            'Last Trainer Name',
            'Last Course Institute',
            'Course Director',
            'Present Posting',
            'Institute Head',
            'BMDC',
            'Subject',
            'Year',
            'Session',
            'Course Year',
            'Mobile',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:N1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    // ->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_YELLOW);FFB2FF8B
                    ->setARGB('FFF16F42');
            },
        ];
    }
}
