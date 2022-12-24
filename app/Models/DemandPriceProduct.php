<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DemandPriceProduct extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'demand_price_product';

    public function demandPrice(): ?BelongsTo
     {
         return $this->belongsTo(DemandPrice::class);
     }

     public function product(): ?BelongsTo
     {
         return $this->belongsTo(Product::class);
     }
}
