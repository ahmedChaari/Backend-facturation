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
     public function categories(): ?HasMany
     {
        return $this->hasMany(Category::class);
     }
     public function clientTypes(): ?HasMany
     {
        return $this->hasMany(ClientType::class);
     }
     public function unities(): ?HasMany
     {
        return $this->hasMany(Unity::class);
     }

     
     public function modelRoles(): ?HasMany
     {
        return $this->hasMany(ModelRole::class);
     }

public function storeRoleCompany($company){
      $i = 5 ;
      $n = 10 ;
      $y = 47 ;
      for ($n = 1; $n < 11; $n++){
          for ($i = 1; $i <= 5; $i++) {  
              ModelRole::create([
                  'company_id'     => $company,
                  'menu_id'        => $n,
                  //'sous_menu_id'   => 1,
                  'role_id'        => $i,
                  'consulter'      => 1,
                  'ajouter'        => 1,
                  'modifier'       => 1,
                  'valider'        => 1,
                  'supprimer'      => 1,
                  'imprimer'       => 1,
                  'exporter'       => 1,
                  'annuler'        => 1,
              ]);
          }
      };    
//create sous menu with role id
      for ($y = 1; $y < 48; $y++){
          for ($i = 1; $i <= 5; $i++) {  
                  ModelRole::create([
                      'company_id'     => $company,
                      //'menu_id'        => $n,
                      'sous_menu_id'   => $y,
                      'role_id'        => $i,
                      'consulter'      => 1,
                      'ajouter'        => 1,
                      'modifier'       => 1,
                      'valider'        => 1,
                      'supprimer'      => 1,
                      'imprimer'       => 1,
                      'exporter'       => 1,
                      'annuler'        => 1,
                  ]);
              }
      }
     }
}
