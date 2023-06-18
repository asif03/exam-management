<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RtmdTrainingWorkshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'mem_fellow_radio', 'fellow_id', 'profession', 'gender', 'candidate_name', 'department', 'email', 'subject_id',
        'institute', 'mailing_addr', 'mobile', 'payment_mode', 'reg_fee', 'verified',
        'bank_name', 'bank_branch', 'money_receipt', 'money_rec_file', 'img_up_file', 'created_at', 'updated_at',
    ];
}