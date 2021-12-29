<?php

namespace App\Repositories\Http;

use App\Exceptions\PatientUnavailableException;
use App\Exceptions\PatientNotFoundException;
use App\Models\Patient;
use App\Repositories\Contracts\PatientRepositoryInterface;
use App\Repositories\Http\Config\PatientConfig;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class PatientRepositoryHttp implements PatientRepositoryInterface
{

    public function show(int $id): Patient
    {
        try {
            $response = Http::retry(PatientConfig::RETRY)
                ->timeout(PatientConfig::TIMEOUT)
                ->withToken(PatientConfig::TOKEN)
                ->get(PatientConfig::URL . $id);

            return new Patient($response->json());
        } catch (RequestException $e) {
            if ($e->getCode() == 404) {
                throw new PatientNotFoundException();
            }
            throw new PatientUnavailableException();
        }
    }
}
