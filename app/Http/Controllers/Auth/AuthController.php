<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
	public function __construct()
	{
			$this->middleware('auth:api', ['except' => ['login']]);
	}
	public function login(Request $request)
	{
		$credentials = $request->only(['email', 'password']);
    $token = auth()->attempt($credentials);

		if (!$token) {
				return response()->json([
						'message' => 'You are not authorized'
						], 401);
		}
		return response()->json([
				'token' => $token,
				'type' => 'bearer',
				'expires_in' => auth()->factory()->getTTL() * 60,
				'user' => auth()->user()
		]);
	}
} 
