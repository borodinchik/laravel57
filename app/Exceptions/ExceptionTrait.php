<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 11/22/18
 * Time: 1:36 PM
 */

namespace App\Exceptions;

use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Response;

trait ExceptionTrait
{
    /**
     * @param $request
     * @param $exception
     * @return \Illuminate\Http\JsonResponse|mixed|object
     */
    public function apiResponseException($request, $exception)
    {
        switch ($exception) {
            case $this->isModel($exception):
                return $this->modelResponse($exception);
            case $this->isHttp($exception):
                return $this->httpResponse($exception);
            case $this->isValidate($exception):
                return $this->validationResponse($request, $exception);
        }
    }
    /*Exception function*/
    protected function isModel($exception)
    {
        return $exception instanceof ModelNotFoundException;
    }
    protected function isHttp($exception)
    {
        return $exception instanceof NotFoundHttpException;
    }
    protected function isValidate($exception)
    {
        return $exception instanceof ValidationException;
    }
    /*Response Function*/
    /**
     * @param $exception
     * @return \Illuminate\Http\JsonResponse
     */
    protected function modelResponse($exception) : object
    {
        return response()->json([
            'error' => 'Model not found'
        ], Response::HTTP_NOT_FOUND);
    }

    /**
     * @param $exception
     * @return \Illuminate\Http\JsonResponse
     */
    protected function httpResponse($exception) : object
    {
        return response()->json([
            'error' => 'Incorrect route'
        ],Response::HTTP_NOT_FOUND);
    }

    /**
     * @param $request
     * @param $exception
     * @return mixed
     */
    protected function validationResponse($request,$exception)
    {
        return parent::render($request, $exception);
    }
}