<?php

namespace App\Services;

use App\DTO\MetricDto;
use App\DTO\PrescriptionDto;
use App\Exceptions\IclinicDomainException;
use App\Exceptions\MetricUnavailableException;
use App\Repositories\Contracts\ClinicRepositoryInterface;
use App\Repositories\Contracts\MetricRepositoryInterface;
use App\Repositories\Contracts\PatientRepositoryInterface;
use App\Repositories\Contracts\PhysicianRepositoryInterface;
use App\Repositories\Contracts\PrescriptionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrescriptionService
{

    public function __construct(protected PrescriptionRepositoryInterface $prescriptionRepository,
    protected ClinicRepositoryInterface $clinicRepository,
    protected PatientRepositoryInterface $patientRepository,
    protected PhysicianRepositoryInterface $physicianRepository,
    protected MetricRepositoryInterface $metricRepository)
    {
    }

    public function store(Request $request): array
    {
        try {

            DB::beginTransaction();

            $clinic = $this->clinicRepository->show($request->input('clinic')['id'] ?? 0);
            $physician = $this->physicianRepository->show($request->input('physician')['id']);
            $patient = $this->patientRepository->show($request->input('patient')['id']);

            $dataDTO = new PrescriptionDto($request);
            $prescription = $this->prescriptionRepository->create($dataDTO->getData());

            $metricDTO = new MetricDto($clinic, $physician, $patient, $prescription);
            $metric = $this->metricRepository->store($metricDTO->getData());
            $prescription->metric = $metric->id;
            $prescription->save();
            DB::commit();
            $metric->setPrescriptionId($prescription->id);
        dd($metric);
            return [
                'id' => $prescription->id,
                'clinic' => $clinic->id,
                'physician' => $physician->id,
                'patient' => $patient->id,
                'text' => $prescription->text,
                'metric' => $metric->id??0,
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            throw new IclinicDomainException(code: $e->getCode());
        }
    }

}
