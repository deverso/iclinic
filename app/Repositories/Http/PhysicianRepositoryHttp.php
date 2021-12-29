<?php

namespace App\Repositories\Http;

use App\Exceptions\PhysicianNotFoundException;
use App\Exceptions\PhysicianUnavailableException;
use App\Models\Physician;
use App\Repositories\Contracts\PhysicianRepositoryInterface;
use App\Repositories\Http\Config\PhysicianConfig;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class PhysicianRepositoryHttp implements PhysicianRepositoryInterface
{

    public function show(string $id): Physician
    {
        try {
            $response = Http::retry(PhysicianConfig::RETRY)
                ->timeout(PhysicianConfig::TIMEOUT)
                ->withToken(PhysicianConfig::TOKEN)
                ->get(PhysicianConfig::URL . $id);

            return new Physician($response->json());
        } catch (RequestException $e) {
            if ($e->getCode() == 404) {
                throw new PhysicianNotFoundException();
            }
            throw new PhysicianUnavailableException();
        }
    }
}
