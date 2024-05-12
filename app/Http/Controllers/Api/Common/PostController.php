<?php

namespace App\Http\Controllers\Api\Common;

use App\Http\Controllers\Controller;
use App\Http\DTO\PostData;
use App\Http\Requests\Common\BaseGetRequest;
use App\Http\Requests\Post\GetPostIdRequest;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Resources\Post\PostResource;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostController extends Controller
{
    public function __construct(
        private PostService $service
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(BaseGetRequest $request): ResourceCollection
    {
        return $this->service->getActive($request->validated());
    }
}

