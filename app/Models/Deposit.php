<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deposit extends Model
{
    use Uuids,  HasFactory;
    protected $guarded = [];


    public function company(): ?BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
