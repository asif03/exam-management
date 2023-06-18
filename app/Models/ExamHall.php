<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamHall extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'exam_halls';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hall_name', 'block_id', 'active'];
}