<?php

namespace App\Repositories\Contracts;

use App\Models\Physician;

interface PhysicianRepositoryInterface
{
    public function show(string $id): Physician;
}
