<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BriefingProgram extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'candidate_name',
        'email',
        'subject_id',
        'mailing_addr',
        'mobile',
        'exam_year',
        'exam_session',
        'money_receipt',
        'created_at',
        'updated_at',
    ];
}