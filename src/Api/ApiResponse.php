<?php

namespace Medianet\APIToolKit\Api;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    /**
     * Return a success response.
     *
     * @param string|null $message Optional success message.
     * @param mixed|null $data Optional data to include in the response.
     *
     * @return JsonResponse Success JSON response.
     */
    public function responseApiKit($status, $data = [], $msg = 'OK', $errors = []): JsonResponse
    {
        $statusBoolean = ((200 == $status) || (201 == $status)) ? true : false;

        $response = [
            'base_url' => config('app.url'),
            'status' => $statusBoolean,
            'message' => $msg,
        ];
        $response['status_code'] = $status;

        if (!empty($data)) {
            $response['data'] = $data;
        }
        if (!empty($errors)) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $status);
    }

    /**
     * Get pagination details of a collection.
     *
     * @param Collection $collection collection
     *
     * @return array
     */
    function getResourceData($collection, $resource)
    {
        if ('none' === request()->get('pagination')) {
            return $resource::collection($collection);
        }

        $currentPage = $collection->currentPage();
        $lastPage = $collection->lastPage();

        return [
            'items' => $resource::collection($collection),
            'current_page' => $currentPage,
            'from' => $collection->firstItem(),
            'to' => $collection->lastItem(),
            'total' => $collection->total(),
            'first_page_url' => $collection->url(1),
            'last_page' => $lastPage,
            'last_page_url' => $collection->url($lastPage),
            'next_page_url' => $collection->nextPageUrl(),
            'path' => $collection->url($currentPage),
            'per_page' => $collection->perPage(),
            'prev_page_url' => $collection->previousPageUrl(),
        ];
    }
}
