<?php

namespace App\Repositories\Contracts;

use App\Models\Prescription;

interface PrescriptionRepositoryInterface
{
    public function create(array $data): Prescription;

    public function delete(string $id): bool;
}
