<?php

namespace App\Services\Auth\Front;

use App\Services\BaseService;
use Laravel\Sanctum\PersonalAccessToken;

class LogoutService extends BaseService
{
    public function __invoke($request)
    {
        $accessToken = $request->bearerToken();
        $token = PersonalAccessToken::findToken($accessToken);
        if($token)
            $token->delete();

        return $this->successResponse([], trans('api.auth.logged_out'), 200);
    }
}
