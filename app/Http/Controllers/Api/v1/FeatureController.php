<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\FeatureResource;
use App\Models\Feature;
use App\Traits\Responseable;
use Exception;
use Illuminate\Http\JsonResponse;

class FeatureController extends Controller
{
    use Responseable;

    public function __invoke(): JsonResponse
    {
        try {
            $data = Feature::query()
                ->active()
                ->get(['id', 'img_url', 'name', 'status', 'description']);
            return $this->respondOk(FeatureResource::collection($data));
        } catch (Exception $exception) {
            return $this->withLog($exception)->respondServerError();
        }
    }
}
