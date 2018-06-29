<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\Factories\InMemoryUserFactory;

class InMemoryUserFactoryTest extends TestCase
{

    protected $factory = null;

    public function setUp()
    {
        $this->factory = new InMemoryUserFactory;
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = $this->factory->create(1);
        $this->assertEquals(1, $user->id);
        
    }
}
