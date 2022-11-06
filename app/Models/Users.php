<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
  use HasFactory;

  protected $connection = 'mongodb';

  protected $collection = 'todo';

  protected $fillable = [
    'email', 'password'
  ];

}
