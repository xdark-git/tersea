<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Admin $resource
 */
class AdminResource extends JsonResource
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
            'email' => $this->resource->email,
            'admin' =>  $this->resource->parent ? [
                'id' => $this->resource->parent->id,
                'name' => $this->resource->parent->name,
                'email'=> $this->resource->parent->email
            ] : null,

            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,

        ];
    }
}
