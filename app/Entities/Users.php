<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Laravel\Passport\HasApiTokens;

class Users extends Model implements AuthenticatableContract, AuthorizableContract{
  use SoftDeletes, Authenticatable, Authorizable, HasApiTokens;
  protected $table = 'users';
  protected $primaryKey = 'id';
  protected $fillable = ['full_name', 'email', 'username', 'password', 'gender'];
  protected $dates = ['deleted_at'];
}