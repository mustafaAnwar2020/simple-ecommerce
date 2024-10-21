<?php

namespace App\Services\Home;

use App\Services\BaseService;

class ProductsService extends BaseService
{
    public function __invoke($model, $relations, $resource, $successResponse)
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
