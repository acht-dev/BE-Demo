<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorizes extends Model
{
    use SoftDeletes;

    public static $criteria = [
        'namaKategori' => 'required|max:255',
    ];
    protected $table = 'categorizes';
    protected $primaryKey = 'id';
    protected $fillable = ['categorize_name'];
    protected $dates = ['deleted_at'];
}
