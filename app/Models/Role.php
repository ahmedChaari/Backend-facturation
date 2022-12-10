<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;
     // protected $fillable = []

     protected $guarded = [];

     public function users(): ?HasMany
     {
        return $this->hasMany(User::class);
     }
     public function company(): ?BelongsTo
     {
         return $this->belongsTo(Company::class);
     }

     public function modelRoles(): ?HasMany
    {
       return $this->hasMany(ModelRole::class);
    }
}
