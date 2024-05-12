<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Requests\Package\ActiveIdRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Common\BaseGetRequest;
use App\Services\PackageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PackageController extends Controller
{
    public function __construct(
        private PackageService $service
    )
    {
    }

    public function index(BaseGetRequest $request): AnonymousResourceCollection
    {
        /* @var User $user */
        $user = auth()->user();
        return $this->service->getByUser($request->validated(), $user);
    }

    public function buy(ActiveIdRequest $request): JsonResponse
    {
        /* @var User $user */
        $user = auth()->user();
        return $this->service->buy($request->package, $user);
    }
}
