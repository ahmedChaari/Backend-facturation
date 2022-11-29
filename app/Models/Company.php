<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use Uuids ,HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $casts   = [
      'has_activated' => 'boolean',
     ];

    public function users(): ?BelongsToMany
     {
      return $this->belongsToMany(User::class)->withPivot('user_id');
     }
    public function deposits(): ?HasMany
     {
        return $this->hasMany(Deposit::class);
     }
     public function products(): ?HasMany
     {
        return $this->hasMany(Product::class);
     }
     public function roles(): ?HasMany
     {
        return $this->hasMany(Role::class);
     }
}
