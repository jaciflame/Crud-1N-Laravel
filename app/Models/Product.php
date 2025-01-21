<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = ["nombre", "descripcion", "imagen", "stock", "category_id"];

    //Relacion
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
