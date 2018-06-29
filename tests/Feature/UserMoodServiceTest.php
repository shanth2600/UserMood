<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use App\Services\UserMoodService;
use App\Repositories\UserInMemoryRepository;
use Tests\Factories\InMemoryUserFactory as Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserMoodServiceTest extends TestCase
{

    protected $repository = null;
    protected $userMoodService = null;

    public function setUp()
    {
        $this->repository = new UserInMemoryRepository;
        $this->userMoodService = new UserMoodService($this->repository);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->repository->save(Factory::create(1));

        $this->userMoodService->updateMood(1, 'Sad');

        $user = $this->repository->find(1);

        $this->assertEquals('Sad', $user->mood);
        
    }
}
