<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'companies';
    protected $primaryKey = 'id';
    protected $fillable = ['company_name', 'address', 'phone', 'email'];
}
