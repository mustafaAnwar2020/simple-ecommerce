<?php

namespace App\Services\Auth\Dashboard;

use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Auth\LoginResource;

class LoginService extends BaseService
{
    public function __invoke($request)
    {
        $guards = ['admin', 'user'];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->attempt($request->validated())) {
                $user = Auth::guard($guard)->user();

                if (!$user->active) {
                    return $this->errorResponse(trans('api.auth.inactive'), 400);
                }

                $user->_token = $user->createToken('user-token')->plainTextToken;

                return $this->successResponse(LoginResource::make($user), trans('api.auth.logged_in'), 200);
            }
        }

        return $this->errorResponse(trans('api.auth.failed'), 400);
    }
}
