<?php

namespace App\Services;

use Illuminate\Http\Request;

interface UserService
{
  function createUser(string $email, string $password);
  // function login(string $email, string $password): bool;
}
