<?php

namespace App\Repositories;

use App\Http\DTO\UserData;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository
{
    public function create(UserData $userData): Model|User
    {
        return User::query()->create($userData->toArray());
    }

    public function getByEmail(string $email)
    {
        return User::query()->where('email', $email)->first();
    }
}
