<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use  HasFactory, SoftDeletes;

    protected $guarded = [];

    public function modelRoles(): ?HasMany
    {
       return $this->hasMany(ModelRole::class);
    }
    public function sousMenus(): ?HasMany
     {
        return $this->hasMany(SousMenu::class);
     }

}
