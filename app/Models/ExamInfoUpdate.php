<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamInfoUpdate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exam_year', 'exam_session', 'roll_no', 'bmdc_reg_no', 'candidate_name', 'subject_id',
        'training_institute_id', 'other_training_institute_name', 'trainer_name', 'course_institute_id',
        'other_course_institute_name', 'course_year', 'course_director', 'present_posting',
        'institute_head', 'mobile', 'created_at', 'updated_at', 'remarks',
    ];
}
