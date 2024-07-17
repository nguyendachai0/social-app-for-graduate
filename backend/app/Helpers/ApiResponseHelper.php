<?php

namespace  App\Helpers;

class ApiResponseHelper
{
    public static function success($data, $message = 'Operation  successful', $statusCode  = 200)
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' =>  $message,
        ], $statusCode);
    }
    public static function error($message, $statusCode = 401)
    {
        return response()->json([
            'success' => false,
            'error' => [
                'code' => $statusCode,
                'message' => $message,
            ],
        ], $statusCode);
    }

    public static function pagination($data, $message = 'Operation successful', $pagination = null, $statusCode = 200)
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'pagination' => $pagination,
            'message' => $message,
        ], $statusCode);
    }
}
