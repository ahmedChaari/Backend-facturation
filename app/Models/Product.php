<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Uuids,  HasFactory , SoftDeletes;
    protected $guarded = [];

    public function company(): ?BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function category(): ?BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function vendor(): ?BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }
    public function deposit(): ?BelongsTo
    {
        return $this->belongsTo(Deposit::class);
    }
    public function user(): ?BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function bons(): ?BelongsToMany
    {
      return $this->belongsToMany(Bon::class); 
    }

    public function demandPrices(): ?BelongsToMany
    {
      return $this->belongsToMany(DemandPrice::class); 
    }
    public function demandPriceProducts(): ?HasMany
    {
       return $this->hasMany(Vendor::class);
    }

    public function tva(): ?BelongsTo
     {
        return $this->belongsTo(Tva::class);
     }
}
