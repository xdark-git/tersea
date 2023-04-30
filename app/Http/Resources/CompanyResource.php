<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Company $resource
 */
class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'created_by' =>  $this->resource->admin ? [
                'id' => $this->resource->admin->id,
                'name' => $this->resource->admin->name,
                'email'=> $this->resource->admin->email
            ] : null,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,

        ];
    }
}
