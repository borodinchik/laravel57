<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 12/7/18
 * Time: 2:10 PM
 */

namespace App\Exceptions;


use Illuminate\Http\Response;

trait JsonResponse
{
    public function getModelJsonResponseException()
    {
        return response()->json([
            'data' => [
                'message' => 'Model not found',
                'status_code' => Response::HTTP_NOT_FOUND
            ]
        ], Response::HTTP_NOT_FOUND);
    }

    public function getHttpJsonResponseException()
    {
        return response()->json([
            'data' => [
                'message' => 'Endpoint not found',
                'status_code' => Response::HTTP_NOT_FOUND
            ]
        ], Response::HTTP_NOT_FOUND);
    }

    public function getBadRequestJsonResponseException($e)
    {
        return response()->json([
            'data' => [
                'message' => $e->getMessage(),
                'status_code' => Response::HTTP_BAD_REQUEST
            ]
        ], Response::HTTP_BAD_REQUEST);
    }

    public function getValidationJsonResponseException($e)
    {
        return response()->json([
            'data' => [
                'message' => $e->errors(),
                'status_code' => Response::HTTP_BAD_REQUEST
            ]
        ], Response::HTTP_BAD_REQUEST);
    }
}