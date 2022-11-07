<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  private UserService $userService;

  public function __construct(UserService $userService)
  {
    $this->userService = $userService;
  }

  public function register(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'email' => 'required|email',
      'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()]
    ]);

    if ($validator->fails()) {
      return response()->json(["status" => 400, "message" => $validator->errors()], 400);
    }

    $email = $request->input('email');
    $password = $request->input('password');

    $data = $this->userService->createUser($email, $password);
    if ($data === "email already registered") {
      return response()->json(["status" => 400, "message" => $data], 400);
    }
    return response()->json(["status" => 201, "message" => $data], 201);
  }

  public function login(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'email' => 'required|email',
      'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()]
    ]);

    if ($validator->fails()) {
      return response()->json(["status" => 400, "message" => $validator->errors()], 400);
    }

    $email = $request->input('email');
    $password = $request->input('password');

    $credential = $request->only('email', 'password');

    if (!$token = Auth::attempt($credential)) {
      return response()->json(["status" => 401, "message" => 'Invalid credentials'], 401);
    }

    $data = $this->userService->login($email, $password);

    return response()->json(["status" => 200, "token" => $token, "message" => $data], 200);
  }
}
