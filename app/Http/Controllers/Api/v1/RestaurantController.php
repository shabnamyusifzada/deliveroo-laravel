<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use App\Traits\Logger;
use App\Traits\Responseable;
use Exception;
use Illuminate\Http\JsonResponse;

class RestaurantController extends Controller
{
    use Responseable;

    public function index(?int $categoryId = null): JsonResponse
    {
        try {
            $data = Restaurant::query()
                ->with([
                    'dishes:id,img_url,name,description,price,restaurant_id',
                    'genre:id,name'
                ])
                ->active()
                ->get([
                    'id',
                    'img_url',
                    'name',
                    'short_description',
                    'description',
                    'address',
                    'latitude',
                    'longitude',
                    'rating',
                    'genre_id'
                ]);
            return $this->respondOk(RestaurantResource::collection($data));
        } catch (Exception $exception) {
            return $this->withLog($exception)->respondServerError();
        }
    }
}
