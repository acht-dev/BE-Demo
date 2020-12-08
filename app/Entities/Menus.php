<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menus extends Model
{
    use SoftDeletes;
    public static $criteria = [
        'namaMenu' => 'required|max:255',
    ];
    protected $table = 'menus';
    protected $primaryKey = 'id';
    protected $fillable = ['name_menu'];
    protected $dates = ['deleted_at'];
}
