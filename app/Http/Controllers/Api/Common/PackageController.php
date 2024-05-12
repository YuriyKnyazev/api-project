<?php

namespace App\Http\Controllers\Api\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\Common\BaseGetRequest;
use App\Services\PackageService;
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
        return $this->service->getActive($request->validated());
    }
}
