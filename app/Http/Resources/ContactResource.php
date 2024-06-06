<?php

namespace App\Http\Resources;

use App\Enums\ContactStatusEnum;
use App\Models\User;
use Carbon\Carbon;
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
            "id" => $this->id,
            "created_by" => $this->whenLoaded('user', fn() => $this->user->name),
            "full_name" => $this->full_name,
            "status" => strtolower(ContactStatusEnum::getLabelById($this->status)),
            "identification" => $this->identification,
            "phones" => $this->phones,
            "emails" => $this->emails,
            "website" => $this->website,
            "address" => $this->address,
            "deleted_at" => Carbon::parse($this->deleted_at)->format('d-m-Y H:i:s'),
            "created_at" => Carbon::parse($this->created_at)->format('d-m-Y H:i:s'),
            "updated_at" => Carbon::parse($this->updated_at)->format('d-m-Y H:i:s'),
        ];
    }
}
