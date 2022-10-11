<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use Uuids ,HasFactory, SoftDeletes;

    protected $guarded = [];

    public function users(): ?BelongsToMany
    {
      return $this->belongsToMany(User::class);

    }
}
