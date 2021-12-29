<?php

namespace App\Repositories\Contracts;

use App\Models\Patient;

interface PatientRepositoryInterface
{
    public function show(int $id): Patient;
}
