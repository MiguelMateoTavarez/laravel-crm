<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
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
            'contact' => $this->whenLoaded('contact', fn()=>$this->contact->full_name),
            'created_by' => $this->whenLoaded('user', fn()=>$this->user->name),
            'description' => $this->description,
        ];
    }
}
