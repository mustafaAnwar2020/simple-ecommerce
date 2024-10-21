<?php

namespace App\Http\Controllers\API\Front\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\Front\LoginService;
use App\Services\Auth\Front\LogoutService;


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
