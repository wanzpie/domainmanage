<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\DomainRequest;

class APIController extends Controller
{
    protected function fail ($message=null,$code =500,$errorrs =[]){
        return response()->json([
                'status'=>'failure',
                'status_code'=>$code,
                'message'=>$message ? $message :'Internal server eror',
                'errors'=>$errorrs,
            ],isset(JsonResponse::$statusTexts[$code]) ? $code :JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }
    protected function success($data, $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'status_code' => $code,
            'message' => JsonResponse::$statusTexts[$code] = 'OK',
            'data' => $data,
        ], isset(JsonResponse::$statusTexts[$code]) ? $code : JsonResponse::HTTP_OK);
    }

    /**
     * @param string|null $message
     * @param int $code
     *
     * @return JsonResponse
     */
    protected function badRequest($message, $code = 400)
    {
        return response()->json([
            'status' => 'Bad Request',
            'status_code' => $code,
            'message' => $message ? $message : 'Bad Request',
        ], isset(JsonResponse::$statusTexts[$code]) ? $code : JsonResponse::HTTP_BAD_REQUEST);
    }

    /**
     * @param string|null $message
     * @param int $code
     *
     * @return JsonResponse
     */
    protected function notFound($message, $code = 404)
    {
        return response()->json([
            'status' => 'Not Found',
            'status_code' => $code,
            'message' => $message ? $message : 'Not Found',
        ], isset(JsonResponse::$statusTexts[$code]) ? $code : JsonResponse::HTTP_NOT_FOUND);
    }

    /**
     * @param string|null $message
     * @param int $code
     *
     * @return JsonResponse
     */
    protected function forbidden($message, $code = 403)
    {
        return response()->json([
            'status' => 'Forbidden',
            'status_code' => $code,
            'message' => $message ? $message : 'Forbidden',
        ], isset(JsonResponse::$statusTexts[$code]) ? $code : JsonResponse::HTTP_FORBIDDEN);
    }
    protected function unauthorized($message, $code = 401)
    {
        return response()->json([
            'status' => 'Unauthorized',
            'status_code' => $code,
            'message' => $message ? $message : 'Unauthorized',
        ], isset(JsonResponse::$statusTexts[$code]) ? $code : JsonResponse::HTTP_UNAUTHORIZED);
    }
}
