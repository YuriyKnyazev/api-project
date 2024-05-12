<?php

namespace App\Http\DTO;

readonly class UserData extends BaseDto
{
    public function __construct(
        public null|string $name,
        public string $email,
        public string $password
    ) {
    }
}
