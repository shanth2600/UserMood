<?php

namespace Tests\Factories;

use App\User;

class InMemoryUserFactory
{
    public static function create(int $id)
    {
        $user = new User;
        $user->id = $id;
        return $user;
    }
}