<?php

namespace Tests\Unit;

use App\Exceptions\PhysicianNotFoundException;
use App\Repositories\Http\PhysicianRepositoryHttp;
use Tests\TestCase;

class PhysicianTest extends TestCase
{

    private PhysicianRepositoryHttp $physicianRepository;

    protected function setUp(): void
    {
        $this->physicianRepository = new PhysicianRepositoryHttp();
        parent::setUp();
    }

    public function test_physician_found()
    {
        $response = $this->physicianRepository->show('1');

        $this->assertEquals('1', $response->id);
    }

    public function test_physician_not_found()
    {
        $this->expectException(PhysicianNotFoundException::class);

        $this->physicianRepository->show('teste');
    }
}
