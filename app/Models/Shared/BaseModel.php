<?php

namespace App\Models\Shared;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class BaseModel extends Model
{
    use HasFactory, SoftDeletes, UuidTrait;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = ['id'];
}
