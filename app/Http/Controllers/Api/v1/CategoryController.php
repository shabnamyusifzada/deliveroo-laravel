<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Traits\Logger;
use App\Traits\Responseable;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    use Responseable;

    public function __invoke(): JsonResponse
    {
        try {
            $data = Category::query()
                ->active()
                ->get(['id', 'img_url', 'name', 'status', 'description']);
            return $this->respondOk(CategoryResource::collection($data));
        } catch (Exception $exception) {
            return $this->withLog($exception)->respondServerError();
        }
    }
}
