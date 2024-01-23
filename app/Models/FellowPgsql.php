<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FellowPgsql extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fellows_pgsql';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fellow_id', 'fellow_name', 'fellow_type_id', 'subject_id_pgsql', 'fellowship_date',
        'home_address', 'office_address', 'email', 'mobile', 'phone_home', 'phone_office', 'pin_no', 'sp_code',
        'institute_id', 'designation_id', 'fax', 'lifetime', 'retired', 'deceased', 'active'];
}
