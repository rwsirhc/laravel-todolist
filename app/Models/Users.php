<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class Users extends Authenticatable
{
  use HasFactory;

  protected $connection = 'mongodb';

  protected $collection = 'todo';

  protected $fillable = [
    'email', 'password'
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];
}
