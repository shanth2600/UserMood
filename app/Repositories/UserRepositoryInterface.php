<?php 

namespace App\Repositories;

use App\User;

interface UserRepositoryInterface
{
    public function find(int $userId);

    public function save(User $user);

    public function all();
}