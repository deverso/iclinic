<?php

namespace App\Repositories\Contracts;

use App\Models\Physician;

interface PhysicianRepositoryInterface
{
    public function show(int $id): Physician;
}
