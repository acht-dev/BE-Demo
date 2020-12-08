<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractTypes extends Model
{
    use SoftDeletes;

    public static $criteria = [
        'namaKontrak' => 'required|max:255',
    ];
    protected $table = 'contract_types';
    protected $primaryKey = 'id';
    protected $fillable = ['contract_name'];
    protected $dates = ['deleted_at'];
}
