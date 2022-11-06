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
		$user = new Users;
	}

	// function login(string $email, string $password): bool 
	// {

	// }


}
