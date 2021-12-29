<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PrescriptionTest extends TestCase
{
    use WithFaker;

    public function test_create_prescription_successfully()
    {
        $data = [
            "clinic" => ["id" => 2],
            "physician" => ["id" => 2],
            "patient" => ["id" => 2],
            "text" => "Pomada 1x ao dia"
        ];

        $response = $this->post('/api/prescriptions', $data);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                "data" => [
                    "id",
                    "clinic" => ["id"],
                    "physician" => ["id"],
                    "patient" => ["id"],
                    "text",
                    "metric" => ["id"]
                ]
            ]);
    }

    public function test_create_prescription_successfully_without_clinic()
    {
        $data = [
            "physician" => ["id" => 3],
            "patient" => ["id" => 3],
            "text" => "Repouso"
        ];

        $response = $this->post('/api/prescriptions', $data);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                "data" => [
                    "id",
                    "clinic" => ["id"],
                    "physician" => ["id"],
                    "patient" => ["id"],
                    "text",
                    "metric" => ["id"]
                ]
            ]);
    }

    public function test_wrong_body_sent()
    {
        $data = [
            "clinic" => ["id" => 1],
            "patient" => ["id" => 11],
            "text" => "Aspirina cada 12 horas"
        ];

        $this->post('/api/prescriptions', $data)->assertStatus(422);
    }
}
