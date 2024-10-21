<?php

namespace App\Services\CRUDServices;

use App\Services\BaseService;


class DeleteService extends BaseService
{
    public function __invoke($model, $id, $successResponse)
    {
        if (is_numeric($id)) {

            $item = $model::findOrFail($id);

            $item->delete();

            return $this->successResponse([], __($successResponse));
        }

        return $this->errorResponse('item not found', 400);
    }
}
