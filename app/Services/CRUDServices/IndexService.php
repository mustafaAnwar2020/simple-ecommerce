<?php

namespace App\Services\CRUDServices;

use App\Services\BaseService;


class IndexService extends BaseService
{
    public function __invoke($model, $resource, $successResponse, $relations)
    {
        $items = $model::setFilters()->with($relations)
            ->paginate($this->getPerPage());

        $response = $resource::collection($items);
        $responseData = $this->createPaginationMeta(
            $response,
            $items->currentPage(),
            $items->lastPage(),
            $items->count()
        );

        return $this->successResponse($responseData, __($successResponse));
    }
}
