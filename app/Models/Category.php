<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ["nombre", "color"];
    //Al quitar timestamps de la migracion
    public $timestamps = false;
    //Relacion
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
