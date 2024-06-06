<?php

namespace App\Models;

use App\Models\Shared\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends BaseModel
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
}
