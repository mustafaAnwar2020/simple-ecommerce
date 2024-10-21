<?php

namespace App\Services;

use App\Traits\ApiResponseTrait;

class BaseService
{
    use ApiResponseTrait;

    public function getPerPage()
    {
        return request()->per_page ?? 10;
    }

}

