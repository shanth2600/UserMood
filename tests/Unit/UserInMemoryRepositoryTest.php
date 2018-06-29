<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\Factories\InMemoryUserFactory as Factory;
use App\Repositories\UserInMemoryRepository;

class UserInMemoryRepositoryTest extends TestCase
{

    public function setUp()
    {
        $this->repository = new UserInMemoryRepository;
    }

    /** @test */
    public function can_save_user()
    {
        $user = Factory::create(1);
        $this->repository->save($user);
        $user = $this->repository->find(1);

        $this->assertEquals(1, $user->id);
    }

    /** @test */
    public function all_works()
    {
        $this->repository->save(Factory::create(1));
        $this->repository->save(Factory::create(2));
        $this->assertCount(2, $this->repository->all());
    }


}