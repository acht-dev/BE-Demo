<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PositionCategories extends Model
{
    use SoftDeletes;

    public static $criteria = [
        'namaPosisiKategori' => 'required|max:255',
    ];
    protected $table = 'position_categories';
    protected $primaryKey = 'id';
    protected $fillable = ['position_name_category'];
    protected $dates = ['deleted_at'];
}
