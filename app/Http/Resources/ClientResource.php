<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'client' => $this->resource->client,
            'adres' => $this->resource->adres,
            'nomer_pdv' => $this->resource->nomer_pdv,
            'statut_fond' => $this->resource->statut_fond,
            'platnyk_pdv' => $this->when($this->resource->platnyk_pdv, true)
        ];
    }
}
