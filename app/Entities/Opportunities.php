<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opportunities extends Model
{
    use SoftDeletes;
    protected $table = 'opportunities';
    protected $primaryKey = 'id';
    protected $fillable = [
        'job_name',
        'time',
        'categorizes_id',
        'job_description',
        'position_category_id',
        'date_open',
        'date_close',
        'education_id',
        'user_id',
        'other_skills',
        'years_experience',
        'contract_type_id',
        'major_id',
        'location_id',
        'language_id',
        'remote',
    ];
    protected $dates = ['deleted_at'];
}
