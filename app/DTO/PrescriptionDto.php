<?php

namespace App\DTO;

use Illuminate\Http\Request;

class PrescriptionDto
{
    private string $clinic, $physician, $patient, $text;

    public function __construct(Request $request)
    {
        $this->clinic = $request->input('clinic')['id']??0;
        $this->physician = $request->input('physician')['id'];
        $this->patient = $request->input('patient')['id'];
        $this->text = $request->input('text');
    }

    public function getData(): array
    {
        return [
            'clinic' => $this->clinic,
            'physician' => $this->physician,
            'patient' => $this->patient,
            'text' => $this->text
        ];
    }
}
