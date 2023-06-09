<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ContactCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $count = $this->collection->count();

        return [
            'count' => $count,
            'data' => $this->collection,
            'links' => ['self' => 'link-value',],
        ];
    }
}
