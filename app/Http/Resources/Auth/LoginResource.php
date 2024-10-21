<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            'name' => $this->name ." " . $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            '_token' => $this->_token,
            'permissions'=>$this->roles()
        ];
    }
}
