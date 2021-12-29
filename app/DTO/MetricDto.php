<?php

namespace App\DTO;

use App\Models\Clinic;
use App\Models\Patient;
use App\Models\Physician;
use App\Models\Prescription;

class MetricDto
{
    private string $clinic_id,
        $clinic_name,
        $physician_id,
        $physician_name,
        $physician_crm,
        $patient_id,
        $patient_name,
        $patient_email,
        $patient_phone,
        $prescription_id;

    /**
     * @param Clinic $clinic
     * @param Physician $physician
     * @param Patient $patient
     * @param Prescription $prescription
     */
    public function __construct(Clinic $clinic, Physician $physician, Patient $patient, Prescription $prescription)
    {
        $this->clinic_id = $clinic->id;
        $this->clinic_name = $clinic->name;
        $this->physician_id = $physician->id;
        $this->physician_name = $physician->name;
        $this->physician_crm = $physician->crm;
        $this->patient_id = $patient->id;
        $this->patient_name = $patient->name;
        $this->patient_email = $patient->email;
        $this->patient_phone = $patient->phone;
        $this->prescription_id = $prescription->id;
    }

    public function getData(): array
    {
        return [
            'clinic_id' => $this->clinic_id,
            'clinic_name' => $this->clinic_name,
            'physician_id' => $this->physician_id,
            'physician_name' => $this->physician_name,
            'physician_crm' => $this->physician_crm,
            'patient_id' => $this->patient_id,
            'patient_name' => $this->patient_name,
            'patient_email' => $this->patient_email,
            'patient_phone' => $this->patient_phone,
            'prescription_id' => $this->prescription_id,
        ];
    }
}
