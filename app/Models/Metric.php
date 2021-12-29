<?php

namespace App\Models;

class Metric
{
    private string $id;
    private string $clinic_id;
    private string $clinic_name;
    private string $physician_id;
    private string $physician_name;
    private string $physician_crm;
    private string $patient_id;
    private string $patient_name;
    private string $patient_email;
    private string $patient_phone;
    private string $prescription_id;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->clinic_id = $data['clinic_id'] ?? '';
        $this->clinic_name = $data['clinic_name'] ?? '';
        $this->physician_id = $data['physician_id'] ?? '';
        $this->physician_name = $data['physician_name'] ?? '';
        $this->physician_crm = $data['physician_crm'] ?? '';
        $this->patient_id = $data['patient_id'] ?? '';
        $this->patient_name = $data['patient_name'] ?? '';
        $this->patient_email = $data['patient_email'] ?? '';
        $this->patient_phone = $data['patient_phone'] ?? '';
        $this->prescription_id = $data['prescription_id'] ?? '';
    }

    public function __get(string $name): string
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        return '';
    }

    /**
     * @param string $prescription_id
     */
    public function setPrescriptionId(string $prescription_id): void
    {
        $this->prescription_id = $prescription_id;
    }
}
