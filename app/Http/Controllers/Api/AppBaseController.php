<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return response()->json([
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ], 200);
    }

    public function sendSuccess($message)
    {
        return response()->json(['message' => $message, 'success' => true], 200);
    }

    public function sendError($error, $code = 404)
    {
        return response()->json(['message' => $error, 'success' => false], $code);
    }

    public function sendData($data)
    {
        return response()->json($data, 200);
    }
}
