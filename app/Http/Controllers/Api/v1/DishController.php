<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\DishResource;
use App\Models\Dish;
use App\Traits\Logger;
use App\Traits\Responseable;
use Exception;
use Illuminate\Http\JsonResponse;

class DishController extends Controller
{
    use Responseable;

    public function __invoke(): JsonResponse
    {
        try {
            $data = Dish::query()
                ->active()
                ->get(['id', 'img_url', 'name', 'status', 'description']);
            return $this->respondOk(DishResource::collection($data));
        } catch (Exception $exception) {
            return $this->withLog($exception)->respondServerError();
        }
    }
}
