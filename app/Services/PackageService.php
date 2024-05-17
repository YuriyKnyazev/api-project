<?php

namespace App\Services;

use App\Http\DTO\PackageData;
use App\Models\Package;
use App\Models\User;
use App\Repositories\PackageRepository;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class PackageService
{
    public function __construct(
        private PackageRepository $repository,
        private UserRepository    $userRepository,
    )
    {
    }

    public function getAll(array $params): LengthAwarePaginator
    {
        $package = $this->repository->getAll($params);
        return ($package);
    }

    public function create(PackageData $packageData): Model|Package
    {
        $package = $this->repository->create($packageData);
        return ($package);
    }

    public function activate(int $id): JsonResponse
    {
        return $this->repository->activate($id);
    }

    public function getActive(array $params): LengthAwarePaginator
    {
        $package = $this->repository->getActive($params);
        return ($package);
    }

    public function getByUser(array $params, User $user): LengthAwarePaginator
    {
        return ($this->repository->getByUser($params, $user));
    }

    public function buy(int $id, User $user): JsonResponse
    {
        if ($this->userRepository->hasPublications($user)) {
            return response()->json(['message' => 'you have active package']);
        }
        $package = $this->repository->getById($id);
        return $this->repository->buy($package, $user);
    }
}
