<?php

namespace App\Services\Impl;

use App\Models\Users;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserServiceImpl implements UserService
{

	/**
	 *
	 * @param string $email
	 * @param string $password
	 *
	 * @return bool
	 */
	function createUser(string $email, string $password)
	{
		$user = Users::create(['email' => $email, 'password' => $password]);
		return $user;
		// $user->email = $email;
		// $user->password = $password;
		// $user->save();
		// return $user;
	}

	// function login(string $email, string $password): bool 
	// {

	// }


}
