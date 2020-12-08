<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Languages extends Model
{
    use SoftDeletes;
    public static $criteria = [
        'namaLanguage' => 'required|max:255',
    ];
    protected $table = 'languages';
    protected $primaryKey = 'id';
    protected $fillable = ['language_name'];
    protected $dates = ['deleted_at'];
}
