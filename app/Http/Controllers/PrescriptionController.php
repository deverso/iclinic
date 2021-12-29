<?php

namespace App\Http\Controllers;

use App\Exceptions\IclinicDomainException;
use App\Exceptions\PrescriptionException;
use App\Http\Controllers\Rules\PrescriptionRule;
use App\Http\Resources\PrescriptionResource;
use App\Services\PrescriptionService;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
            return new PrescriptionResource($response);
        } catch (IclinicDomainException $e) {
            return response()->json([
                'error' => [
                    'message' => $e->getMessage(),
                    'code' => $e->getInnerCode()
                ]], $e->getCode());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
