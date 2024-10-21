<?php

namespace App\Http\Controllers\API\Dashboard\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Auth\Front\LogoutService;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\Dashboard\LoginService;

class AuthController extends Controller
{
    protected function login(LoginRequest $request)
    {
        $login = new LoginService;

        return $login($request);
    }

    protected function logout(Request $request)
    {
        $logout = new LogoutService;

        return $logout($request);
    }
}
