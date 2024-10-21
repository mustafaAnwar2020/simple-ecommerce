<?php
namespace App\Traits;

trait ApiResponseTrait
{

    public function successResponse($data = [], $message = null, $status = 200)
    {
        $response = [
            'success' => true,
            'data' => $data,
            'message' => $message,
        ];

        return response()->json($response, $status);
    }

    public function errorResponse($message = '', $status = 400, $errors = null)
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if ($errors) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $status);
    }

    protected function createPaginationMeta($items, $currentPage, $lastPage, $total): array
    {
        return [
            'data' => $items,
            'current_page' => $currentPage,
            'last_page' => $lastPage,
            'items_count' => $total,
        ];
    }
}

