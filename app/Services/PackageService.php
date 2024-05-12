<?php

namespace App\Services;

use App\Http\DTO\PackageData;
use App\Http\Resources\Package\PackageResource;
use App\Models\User;
use App\Repositories\PackageRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PackageService
{
    public function __construct(
        private PackageRepository $repository
    )
    {
    }

    public function getAll(array $params): AnonymousResourceCollection
    {
        $package = $this->repository->getAll($params);
        return PackageResource::collection($package);
    }

    public function create(PackageData $packageData): PackageResource
    {
        $package = $this->repository->create($packageData);
        return PackageResource::make($package);
    }

    public function activate(int $id): JsonResponse
    {
        return $this->repository->activate($id);
    }

    public function getActive(array $params): AnonymousResourceCollection
    {
        $package = $this->repository->getActive($params);
        return PackageResource::collection($package);
    }

    public function getByUser(array $params, User $user): AnonymousResourceCollection
    {
        return PackageResource::collection($this->repository->getByUser($params, $user));
    }

    public function buy(int $id, User $user): JsonResponse
    {
        $package = $this->repository->getById($id);
        return $this->repository->buy($package, $user);
    }
}
