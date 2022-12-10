<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelRole extends Model
{
    use Uuids, HasFactory, SoftDeletes;

    protected $guarded = [];

    public function company(): ?BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function menu(): ?BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
    public function sousMenu(): ?BelongsTo
    {
        return $this->belongsTo(SousMenu::class);
    }
    public function role(): ?BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
