<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Uuids, HasFactory, HasApiTokens, SoftDeletes, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = ['id'];
   // protected $fillable = [
     //   'name', 'email', 'password',
    //];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function companies(): ?BelongsToMany
    {
      return $this->belongsToMany(Company::class)->withPivot('user_id');
     
    }
    public function role(): ?BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
    public function user(): ?BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function deposit(): ?BelongsTo
    {
        return $this->belongsTo(Deposit::class);
    }
    public function products(): ?HasMany
     {
        return $this->hasMany(Product::class);
     }
     // bon
     public function bons(): ?HasMany
     {
        return $this->hasMany(Bon::class);
     }
     // vendors
     public function vendors(): ?HasMany
     {
        return $this->hasMany(Vendor::class);
     }
}
