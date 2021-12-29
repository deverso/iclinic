<?php

namespace App\Repositories\Http;

use App\Exceptions\MetricUnavailableException;
use App\Models\Metric;
use App\Repositories\Contracts\MetricRepositoryInterface;
use App\Repositories\Http\Config\MetricConfig;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class MetricRepositoryHttp implements MetricRepositoryInterface
{

    public function store(array $data): Metric
    {
        try {
            $response = Http::retry(MetricConfig::RETRY)
                ->timeout(MetricConfig::TIMEOUT)
                ->withToken(MetricConfig::TOKEN)
                ->post(MetricConfig::URL, $data);

            return new Metric($response->json());
        } catch (RequestException $e) {
            throw new MetricUnavailableException(code: $e->getCode());
        }
    }
}
