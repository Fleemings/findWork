<?php

namespace App\Traits;

trait JsonResponse
{
    protected function success($data, $message = null, $code = 200)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function error($data, $message = null, $code)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}
