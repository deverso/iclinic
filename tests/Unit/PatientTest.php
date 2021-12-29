<?php

namespace Tests\Unit;

use App\Exceptions\PatientNotFoundException;
use App\Repositories\Http\PatientRepositoryHttp;
use Tests\TestCase;

class PatientTest extends TestCase
{

    private PatientRepositoryHttp $patientRepository;

    protected function setUp(): void
    {
        $this->patientRepository = new PatientRepositoryHttp();
        parent::setUp();
    }

    public function test_patient_found()
    {
        $response = $this->patientRepository->show('1');

        $this->assertEquals('1', $response->id);
    }

    public function test_patient_not_found()
    {
        $this->expectException(PatientNotFoundException::class);

        $this->patientRepository->show('teste');
    }
}
