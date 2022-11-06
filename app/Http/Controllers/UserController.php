<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
  private UserService $userService;

  public function __construct(UserService $userService)
  {
    $this->userService = $userService;
  }

  public function createUser(Request $request)
  {
    $email = $request->input('email');
    $password = $request->input('password');

    $data = $this->userService->createUser($email, $password);
    return response()->json(["status" => 201, "message" => $data], 201);
  }
}
