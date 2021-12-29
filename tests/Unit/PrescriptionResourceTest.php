<?php
namespace Tests\Unit;

use App\Http\Resources\PrescriptionResource;
use Tests\TestCase;

class PrescriptionResourceTest extends TestCase
{

    public function test_to_array()
    {
        $data = [
            'id' => 1,
            'clinic' => 3,
            'physician' => 5,
            'patient' => 12,
            'text' => '1 vez ao dia',
            'metric' => '5'
        ];

        $response = (new PrescriptionResource($data))->response()->getData()->data;
        $this->assertEquals('1', $response->id);
        $this->assertEquals('3', $response->clinic->id);
        $this->assertEquals('5', $response->physician->id);
        $this->assertEquals('12', $response->patient->id);
        $this->assertEquals('1 vez ao dia', $response->text);
        $this->assertEquals('5', $response->metric->id);
    }

}
