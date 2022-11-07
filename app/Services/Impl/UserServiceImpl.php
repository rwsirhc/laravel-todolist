<?php

namespace App\Services\Impl;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;

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
		$user = new User;
		if ($user->where('email', $email)->first() == null) {
			$user->email = $email;
			$user->password = bcrypt($password);
			$user->save();
			$data = ['_id' => $user->_id, 'email' => $user->email];
			return $data;
		} else {
			return "email already registered";
		}
	}

	function login(string $email, string $password)
	{
		$user = new User;
		$data = $user->where('email', $email)->first();
		$result = ['_id' => $data->_id, 'email' => $data->email];
		return $result;
	}
	function updateUser(string $_id)
	{
	}
}
