<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Educations extends Model
{
    use SoftDeletes;

    public static $criteria = [
        'namaEdukasi' => 'required|max:255',
    ];
    protected $table = 'educations';
    protected $primaryKey = 'id';
    protected $fillable = ['education_name'];
    protected $dates = ['deleted_at'];
}
