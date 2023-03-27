<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

trait Responseable
{
    public function respondError(int $status, mixed $data = null): JsonResponse
    {
        return $this->respond('error', $status, $data);
    }

    public function respondSuccess(int $status, mixed $data = null): JsonResponse
    {        return $this->respond('success', $status, $data);
    }

    public function respondOk(mixed $data = null): JsonResponse
    {
        return $this->respondSuccess(Response::HTTP_OK, $data);
    }

    public function respondCreated(): JsonResponse
    {
        return $this->respondSuccess(Response::HTTP_CREATED);
    }

    public function respondFound(): JsonResponse
    {
        return $this->respondError(Response::HTTP_FOUND);
    }

    public function respondUnauthorized(): JsonResponse
    {
        return $this->respondError(Response::HTTP_UNAUTHORIZED);
    }

    public function respondPaymentRequired(): JsonResponse
    {
        return $this->respondError(Response::HTTP_PAYMENT_REQUIRED);
    }

    public function respondForbidden(): JsonResponse
    {
        return $this->respondError(Response::HTTP_FORBIDDEN);
    }

    public function respondNotFound(): JsonResponse
    {
        return $this->respondError(Response::HTTP_NOT_FOUND);
    }

    public function respondMethodNotAllowed(): JsonResponse
    {
        return $this->respondError(Response::HTTP_METHOD_NOT_ALLOWED);
    }

    public function respondConflict(): JsonResponse
    {
        return $this->respondError(Response::HTTP_CONFLICT);
    }

    public function respondUnprocessableEntity(mixed $data = null): JsonResponse
    {
        return $this->respondError(Response::HTTP_UNPROCESSABLE_ENTITY, $data);
    }

    public function respondLocked(mixed $data = null): JsonResponse
    {
        return $this->respondError(Response::HTTP_LOCKED, $data);
    }

    public function respondServerError(): JsonResponse
    {
        return $this->respondError(Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function responseNotImplemented(): JsonResponse
    {
        return $this->respondError(Response::HTTP_NOT_IMPLEMENTED);
    }

    protected function respond(string $type, int $status, mixed $data = null): JsonResponse
    {
        $response = $data ? [$type => true, 'data' => $data] : [$type => true];
        return response()->json($response, $status);
    }

    public function withLog(Exception|Throwable $exception): self
    {
        logger()->channel('app')->error($exception->getMessage(), [
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'code' => $exception->getCode()
        ]);

        return $this;
    }
}
