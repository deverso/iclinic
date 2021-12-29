<?php

namespace App\Repositories\Eloquent;

use App\Models\Prescription;
use App\Repositories\Contracts\PrescriptionRepositoryInterface;

class PrescriptionRepositoryEloquent implements PrescriptionRepositoryInterface
{
    protected Prescription $entity;

    public function __construct(Prescription $prescription)
    {
        $this->entity = $prescription;
    }

    public function create(array $data): Prescription
    {
        return $this->entity->create($data);
    }
}
