<?php

namespace App\Services\Auth\Front;

use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Auth\Front\LoginResource;

class LoginService extends BaseService
{
    public function __invoke($request)
    {

        if (Auth::guard('web')->attempt($request->all())) {
            $user = Auth::guard('web')->user();

            if (!$user->active || $user->deleted_at !== null) {
                return $this->errorResponse(trans('api.auth.inactive'), 401);
            }

            $user->_token = $user->createToken('user-token')->plainTextToken;

            return $this->successResponse(LoginResource::make($user), trans('api.auth.logged_in'), 200);
        }


        return $this->errorResponse(trans('api.auth.failed'), 400);
    }
}
