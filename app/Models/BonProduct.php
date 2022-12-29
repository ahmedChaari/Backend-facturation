<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BonProduct extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'bon_product';

    public function product(): ?BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function bon(): ?BelongsTo
    {
        return $this->belongsTo(Bon::class);
    }
}
