<?php

namespace Tests\Unit;

use App\Repositories\Http\ClinicRepositoryHttp;
use Tests\TestCase;

class ClinicTest extends TestCase
{

    private ClinicRepositoryHttp $clinicRepository;

    protected function setUp(): void
    {
        $this->clinicRepository = new ClinicRepositoryHttp();
        parent::setUp();
    }

    public function test_clinic_found()
    {
        $response = $this->clinicRepository->show('1');

        $this->assertEquals('1', $response->id);
    }

    public function test_clinic_not_found()
    {
        $response = $this->clinicRepository->show('teste');

        $this->assertEquals('0', $response->id);
    }
}
