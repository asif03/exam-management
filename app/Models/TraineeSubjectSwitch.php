<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraineeSubjectSwitch extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_no', 'ref_date', 'gender', 'from_subject_id', 'to_subject_id', 'degree_type', 'candidate_name',
        'registration_no', 'created_at', 'updated_at',
    ];
}