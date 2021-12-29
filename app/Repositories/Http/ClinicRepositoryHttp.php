<?php

namespace App\Repositories\Http;

use App\Models\Clinic;
use App\Repositories\Contracts\ClinicRepositoryInterface;
use App\Repositories\Http\Config\ClinicConfig;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class ClinicRepositoryHttp implements ClinicRepositoryInterface
{

    public function show(int $id): Clinic
    {
        try {
            $response = Http::retry(ClinicConfig::RETRY)
                ->timeout(ClinicConfig::TIMEOUT)
                ->withToken(ClinicConfig::TOKEN)
                ->get(ClinicConfig::URL . $id);

            return new Clinic($response->json());
        } catch (RequestException $e) {
            return new Clinic(['id' => 0, 'name' => '']);
        }


    }
}
