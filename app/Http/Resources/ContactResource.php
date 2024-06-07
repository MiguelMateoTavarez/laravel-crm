<?php

namespace App\Http\Resources;

use App\Enums\ContactStatusEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            'created_by' => $this->whenLoaded('user', fn () => $this->user->name),
            'full_name' => $this->full_name,
            'status' => strtolower(ContactStatusEnum::getLabelById($this->status)),
            'identification' => $this->identification,
            'phones' => $this->phones,
            'emails' => $this->emails,
            'website' => $this->website,
            'address' => $this->address,
        ];
    }
}
