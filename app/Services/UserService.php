<?php

namespace App\Services;

interface UserService
{
  function createUser(string $email, string $password);
  function login(string $email, string $password);
}
