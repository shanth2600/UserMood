<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserMoodService;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Repositories\UserRepositoryInterface;

class UserController extends Controller
{

    protected $users = null;

    public function __construct(
        UserRepositoryInterface $users,
        UserMoodService $userMoodService
    ){
        $this->users = $users;
        $this->userMoodService = $userMoodService;
    }

    public function updateMood($id, Request $request)
    {
        $this->userMoodService->updateMood($id, $request->mood);
    }

    public function getUsers()
    {
        return $this->users->all();
    }
}
