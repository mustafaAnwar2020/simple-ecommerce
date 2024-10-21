<?php

namespace App\Http\Controllers\API\Dashboard\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Services\Admin\Dashboard\StoreService;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Services\Admin\Dashboard\UpdateService;
use App\Http\Controllers\API\Base\BaseController;
use App\Http\Resources\Admin\Dashboard\EditAdminResource;
use App\Http\Resources\Admin\Dashboard\ListAdminResource;
use App\Http\Resources\Admin\Dashboard\ShowAdminResource;

class AdminController extends BaseController
{
    protected $model = Admin::class;
    protected $listResource = ListAdminResource::class;
    protected $showResource = ShowAdminResource::class;
    protected $editResource = EditAdminResource::class;
    protected $storeRequest = StoreAdminRequest::class;
    protected $updateRequest = UpdateAdminRequest::class;
    protected $translated = [];
    protected $relations = [];
    protected string $savedResponse = 'api.admin.saved';
    protected string $updatedResponse = 'api.admin.updated';
    protected string $deletedResponse = 'api.admin.deleted';
    protected string $successResponse = 'api.admin.success';
    protected string $errorResponse = 'api.admin.error';

    public function store(Request $request)
    {
        $service = new StoreService();

        return $service(
            $this->model,
            $this->storeRequest,
            $request,
            $this->showResource,
            $this->successResponse
        );
    }

    public function update(Request $request, $id)
    {
        $service = new UpdateService();

        return $service(
            $this->model,
            $request,
            $this->updateRequest,
            $id,
            $this->showResource,
            $this->updatedResponse,
            $this->errorResponse,
            $this->relations
        );
    }
}
