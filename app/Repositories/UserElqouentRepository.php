<?php

namespace App\Repositories;

use App\User;

class UserElqouentRepository implements UserRepositoryInterface
{

    public function find(int $id)
    {
        return User::find($id);
    }

    public function save(User $user)
    {
        $user->save();
    }

    public function all()
    {
        return User::all();
    }
}