<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Majors extends Model
{
    use SoftDeletes;

    public static $criteria = [
        'namaMajor' => 'required|max:255',
    ];
    protected $table = 'majors';
    protected $primaryKey = 'id';
    protected $fillable = ['major_name'];
    protected $dates = ['deleted_at'];
}
