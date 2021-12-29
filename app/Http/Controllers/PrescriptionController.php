<?php

namespace App\Http\Controllers;

use App\Exceptions\IclinicDomainException;
use App\Http\Controllers\Rules\PrescriptionRule;
use App\Http\Resources\PrescriptionResource;
use App\Services\PrescriptionService;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return PrescriptionResource
     */
    public function store(Request $request, PrescriptionService $prescriptionService)
    {
        try {
            PrescriptionRule::validateRequest($request);
            $response = $prescriptionService->store($request);
            return (new PrescriptionResource($response))->response()->setStatusCode(201);
        } catch (IclinicDomainException $e) {
            return response()->json([
                'error' => [
                    'message' => $e->getMessage(),
                    'code' => $e->getInnerCode()
                ]], $e->getCode());
        }

    }
}
