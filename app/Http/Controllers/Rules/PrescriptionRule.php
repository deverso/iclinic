<?php

namespace App\Http\Controllers\Rules;

use App\Exceptions\PrescriptionRequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PrescriptionRule
{
    static function validateRequest(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
           'physician.id' => 'required|numeric',
            'patient.id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            throw new PrescriptionRequestException();
        }
    }
}
