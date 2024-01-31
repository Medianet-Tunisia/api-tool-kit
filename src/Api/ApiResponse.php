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
}
