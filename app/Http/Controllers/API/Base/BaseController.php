<?php

namespace App\Http\Controllers\API\Base;

use App\Services\CRUDServices\{IndexService, ShowService, StoreService, UpdateService, DeleteService};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $storeRequest, $updateRequest;
    protected $listResource, $editResource, $showResource;
    protected $model, $relations = [], $translated = [];
    protected string $successResponse = '', $savedResponse = '',$updatedResponse = '' , $deletedResponse = '', $errorResponse = '';

    public function __construct(
        private IndexService $IndexService,
        private ShowService $ShowService,
        private ShowService $EditService,
        private UpdateService $UpdateService,
        private StoreService $StoreService,
        private DeleteService $DestroyService,
    ) {
    }


    public function index()
    {
        return $this->IndexService->__invoke(
            $this->model,
            $this->listResource,
            $this->successResponse,
            $this->relations,
        );
    }

    public function edit($id)
    {
        return $this->EditService->__invoke(
            $this->model,
            $this->editResource,
            $id,
            $this->successResponse,
            $this->relations,
        );
    }

    public function show($id)
    {
        return $this->ShowService->__invoke(
            $this->model,
            $this->showResource,
            $id,
            $this->successResponse,
            $this->relations,
        );
    }

    public function store(Request $request)
    {
        return $this->StoreService->__invoke(
            $this->model,
            $request,
            $this->storeRequest,
            $this->showResource,
            $this->translated,
            $this->savedResponse,
        );
    }

    public function update(Request $request, $id)
    {
        return $this->UpdateService->__invoke(
            $this->model,
            $request,
            $this->updateRequest,
            $id,
            $this->showResource,
            $this->updatedResponse,
            $this->errorResponse,
            $this->relations,
        );
    }

    public function destroy($id)
    {
        return $this->DestroyService->__invoke(
            $this->model,
            $id,
            $this->deletedResponse,
        );
    }
}
