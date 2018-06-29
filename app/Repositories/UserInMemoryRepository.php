<?php

namespace App\Repositories;

use App\User;

class UserInMemoryRepository implements UserRepositoryInterface
{

    protected $users = [];

    public function find(int $userId)
    {
        if(array_key_exists($userId, $this->users)){
            return $this->users[$userId];
        }
    }

    public function save(User $user)
    {
        $this->users[$user->id] = $user;
    }

    public function all()
    {

        if(!empty($this->users)){
            return collect(array_values($this->users));
        }else{
            return collect([]);
        }

    }

}