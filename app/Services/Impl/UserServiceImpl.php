<?php

namespace App\Services\Impl;

use App\Models\Users;
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
		$user = new Users;
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
		$user = new Users;
		if ($user->where('email', $email)->first() == null) {
			return "not found";
		} else {
			$data = $user->where('email', $email)->first();
			if (Hash::check($password, $data->password)) {
				$result = ['_id' => $data->_id, 'email' => $data->email];
				return $result;
			} else {
				return "wrong password";
			}
		}
	}
}
