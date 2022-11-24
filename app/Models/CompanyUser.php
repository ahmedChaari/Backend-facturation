<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CompanyUser extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'company_user';

   
}
