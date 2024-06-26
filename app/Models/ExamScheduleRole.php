<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamScheduleRole extends Model
{
    use HasFactory;

    protected $fillable = ['position_name', 'description', 'active'];
}