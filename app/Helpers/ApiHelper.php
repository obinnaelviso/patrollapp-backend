<?php

use Symfony\Component\HttpFoundation\Response;

/**
 * Return an success JSON response.
 *
 * @param  mixed $data
 * @param  string  $message
 * @param  int $code
 * @return \Illuminate\Http\JsonResponse
 */
function apiSuccess($data, string $message = "", int $code = 200)
{
    return response()->json([
        'status' => 'success',
        'message' => $message,
        'data' => $data
    ], $code);
}

/**
 * Return an error JSON response.
 *
 * @param  string  $message
 * @param  int  $code
 * @param  array $error
 * @return \Illuminate\Http\JsonResponse
 */
function apiError(string $message = "", int $code = Response::HTTP_BAD_REQUEST, $errors = [])
{
    return response()->json([
        'status' => 'error',
        'message' => $message,
        'errors' => $errors
    ], $code);
}
