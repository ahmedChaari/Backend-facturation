<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class States extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = ['states'];


    public function country(): ?BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
