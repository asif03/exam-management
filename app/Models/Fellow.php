<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fellow extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fellows';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fellowship_status_id', 'fellowship_year', 'fellowship_session', 'fellowship_date', 'fellow_id', 'name', 'subject_id', 'office_add', 'home_address',
        'office_tel', 'home_tel', 'mobile', 'e_mail', 'sub', 'desg', 'inst', 'remarks', 'lifetime_member', 'retired', 'deceased', 'updated_at'];
}
