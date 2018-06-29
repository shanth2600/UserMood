<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;

class UserMoodService
{

    protected $users = null;

    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    public function updateMood(int $id, string $mood)
    {
        $user = $this->users->find($id);
        $user->mood = $mood;
        $this->users->save($user);
    }
    

}