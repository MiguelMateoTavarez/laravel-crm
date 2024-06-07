<?php

namespace App\Models;

use App\Models\Shared\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends BaseModel
{
    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
