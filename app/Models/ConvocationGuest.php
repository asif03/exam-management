<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvocationGuest extends Model
{
    use HasFactory;

    protected $fillable = [
        'mem_fellow_radio', 'fellow_id','subject_id', 'exam_year', 'exam_session','candidate_name', 'father_name','mailing_addr','mobile','email',
        'is_spouse_chk', 'is_origin_cert_rec', 'is_prov_cert_rec','spouse_name', 'spouse_relation','payment_mode','reg_fee', 'verified',  'money_receipt_no',
        'bank_name', 'bank_branch', 'date_submission', 'money_rec_file', 'img_up_file', 'created_at', 'updated_at', 
    ];
}
