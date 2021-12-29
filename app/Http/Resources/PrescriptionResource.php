<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = $this->resource;

        return [
            'id' => $data['id'],
            'clinic' => ['id' => $data['clinic']],
            'physician' => ['id' => $data['physician']],
            'patient' => ['id' => $data['patient']],
            'text' => $data['text'],
            'metric' => ['id' => $data['metric']],
        ];
    }
}
