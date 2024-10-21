<?php

namespace App\Http\Resources\Auth\Front;

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
            'dialing_code' => $this->dialing_code,
            '_token' => $this->_token,
        ];
    }
}
