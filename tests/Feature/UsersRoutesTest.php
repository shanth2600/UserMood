<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Factories\InMemoryUserFactory as Factory;
use App\Repositories\UserInMemoryRepository;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersRoutesTest extends TestCase
{

    protected $repository = null;

    public function setUp()
    {
        parent::setUp();
        $this->repository = new UserInMemoryRepository;
        $this->app->instance(UserRepositoryInterface::class, $this->repository);

    }

    /**
     * @test
     */
    public function get_route_works()
    {
        $this->repository->save(Factory::create(1));
        $this->repository->save(Factory::create(2));
        $this->repository->save(Factory::create(3));
        
        $response = $this->json('get','/users');

        $response->assertJsonCount(3);

    }

    /** @test */
    public function update_mood_route_works()
    {
        $this->repository->save(Factory::create(1));   
        $this->json('post','/userMood/1', ['mood' => 'Mad']);

        $user = $this->repository->find(1);
        $this->assertEquals('Mad', $user->mood);

    }
}
