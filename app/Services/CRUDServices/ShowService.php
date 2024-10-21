<?php

namespace App\Services\CRUDServices;

use App\Services\BaseService;


class ShowService extends BaseService
{
    public function __invoke($model, $resource, $id, $successResponse, $relations)
    {

        if (is_numeric($id)) {
            $item = $model::with($relations)->findOrFail($id);
            $response = $resource::make($item);

            return $this->successResponse($response, __($successResponse));
        }

        return $this->errorResponse('item not found', 400);
    }
}
