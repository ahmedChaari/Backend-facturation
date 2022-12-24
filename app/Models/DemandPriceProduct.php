<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandPriceProduct extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'demand_price_product';
}
