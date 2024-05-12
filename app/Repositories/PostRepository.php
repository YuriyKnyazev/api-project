<?php

namespace App\Repositories;

use App\Enums\Post\PostStatusEnum;
use App\Http\DTO\PostData;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class PostRepository
{
    public function getAll(array $params): LengthAwarePaginator
    {
        return Post::query()->paginate($params['limit']);
    }

    public function create(PostData $postData): Model|Post
    {
        return Post::query()->create($postData->toArray());
    }

    public function show(int $id): Model|Post
    {
        return Post::query()->find($id);
    }

    public function update(PostData $postData): void
    {
        Post::query()->where('id', $postData->id)->update($postData->toArray());
        response()->json();
    }

    public function delete(int $id): void
    {
        Post::query()->where('id', $id)->delete();
    }

    public function getActive(array $params): LengthAwarePaginator
    {
        return Post::query()
            ->where('status', PostStatusEnum::ACTIVE->value)
            ->paginate($params['limit']);
    }

    public function getByUser(array $params, User $user): LengthAwarePaginator
    {
        return Post::query()
            ->where('user_id', $user->getKey())
            ->paginate($params['limit']);
    }
}
