<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamScheduleMaster extends Model
{
    use HasFactory;

    protected $fillable = ['exam_year', 'exam_session', 'exam_type_id', 'mother_subject_id',
        'exam_date', 'exam_start_time', 'exam_end_time', 'reporting_time',
        'hall_id', 'is_schedule_meeting', 'meeting_date',
        'meeting_time', 'active'];
}
