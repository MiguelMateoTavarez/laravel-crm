<?php

namespace App\Http\Resources;

use App\Enums\ScheduleTypeEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
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
            'contact' => $this->whenLoaded('contact', fn() => $this->contact->full_name),
            'created_by' => $this->whenLoaded('user', fn() => $this->user->name),
            'type' => strtolower(ScheduleTypeEnum::getLabelById($this->type)),
            'description' => $this->description,
            'date' => $this->date,
            'expiration_date' => $this->expiration_date,
            'time' => $this->time,
            'address' => $this->address,
            'reminder' => $this->reminder,
        ];
    }
}
