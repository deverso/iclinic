<?php

namespace App\Repositories\Contracts;

use App\Models\Metric;

interface MetricRepositoryInterface
{
    public function store(array $data): Metric;
}
