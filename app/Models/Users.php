<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Users extends Model
{
  use HasFactory;

  protected $connection = 'mongodb';

  protected $collection = 'users';

  protected $fillable = [
    'email', 'password'
  ];
}
