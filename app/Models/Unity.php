<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unity extends Model
{
    use Uuids ,HasFactory, SoftDeletes;
    protected $guarded = [];

    public function company(): ?BelongsTo
    {
        return $this->belongsTo(Company::class);
    }}
