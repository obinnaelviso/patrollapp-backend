<?php

namespace App\Http\Controllers;

use App\Http\Services\TokenService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public $tokenService;

    public function __construct(TokenService $tokenService)
    {
        $this->tokenService = $tokenService;
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'device_name' => 'required'
        ]);
        $data = $this->tokenService->generateLoginToken($request->all());
        return apiSuccess($data, 'Login Successful');
    }

    public function logout()
    {
        $this->tokenService->revokeAllToken();
        return apiSuccess([], 'Logout Successful');
    }
}
