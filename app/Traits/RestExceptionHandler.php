<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

trait RestExceptionHandler
{
    /**
     * Creates a new JSON response based on exception type.
     *
     * @param Request $request
     * @param Exception $e
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getJsonResponse(Request $request, Exception $e)
    {
        switch(true) {
            case $this->isModelNotFoundException($e):
                $result = $this->modelNotFound();
                break;
            case $this->isValidationException($e):
                $result = $this->validationFailed($e);
                break;
            default:
                $result = $this->badRequest($e->getMessage());
        }

        return $result;
    }

    /**
     * Determines if the given exception
     * is an Eloquent model not found.
     *
     * @param Exception $e
     * @return bool
     */
    protected function isModelNotFoundException(Exception $e)
    {
        return $e instanceof ModelNotFoundException;
    }

    /**
     * Assures it is a ValidationException
     *
     * @param Exception $e
     * @return boolean
     */
    protected function isValidationException(Exception $e)
    {
        return $e instanceof ValidationException;
    }

    /**
     * Returns json response.
     *
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonResponse(string $message, $statusCode = Response::HTTP_NOT_FOUND)
    {
        return response()->json(
            [
                'status' => false,
                'message' => $message
            ],
            $statusCode
        );
    }

    /**
     * Returns json response for Eloquent model not found exception.

     * @return \Illuminate\Http\JsonResponse
     */
    protected function modelNotFound()
    {
        return $this->jsonResponse('Record not found');
    }

    /**
     * Returns json response for failed validation

     * @return \Illuminate\Http\JsonResponse
     */
    protected function validationFailed($e)
    {
        return response()->json(
            [
                'message' => 'The given data was invalid.' ,
                'errors' => $e->errors()
            ],
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }

    /**
     * Returns json response for generic bad request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function badRequest($message)
    {
        return $this->jsonResponse($message, Response::HTTP_BAD_REQUEST);
    }
}