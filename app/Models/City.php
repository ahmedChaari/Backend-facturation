<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory ;

    protected $guarded = [];
   // protected $table = ['cities'];


    public function country(): ?BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

}
