<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamScheduleDetail extends Model
{
    use HasFactory;

    protected $fillable = ['schedule_master_id', 'fellow_id', 'role_id', 'email_sent', 'sms_sent', 'active'];
}
