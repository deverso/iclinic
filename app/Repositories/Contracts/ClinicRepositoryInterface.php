<?php

namespace App\Repositories\Contracts;

use App\Models\Clinic;

interface ClinicRepositoryInterface
{
    public function show(string $id): Clinic;
}
