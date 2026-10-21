<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'passport_file' => $this->passport_file,
            'title' => $this->title,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'full_name' => "{$this->first_name} {$this->middle_name} {$this->last_name}",
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'marital_status' => $this->marital_status,
            'residential_address' => $this->residential_address,
            'permanent_address' => $this->permanent_address,
            'phone_number' => $this->phone_number,
            'nationality' => $this->nationality,
            'nin' => $this->nin,
            'email_address' => $this->email_address,
            'ippis_no' => $this->ippis_no,
            'employee_no' => $this->employee_no,
            'lga' => new LgaResource($this->whenLoaded('lga')),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
