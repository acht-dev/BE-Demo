<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Locations extends Model
{
    use SoftDeletes;

    public static $criteria = [
        'namaLokasi' => 'required|max:255',
    ];
    protected $table = 'locations';
    protected $primaryKey = 'id';
    protected $fillable = ['location_name'];
    protected $dates = ['deleted_at'];
}
