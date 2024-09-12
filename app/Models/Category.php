<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'model_has_category';

    public function posts () : HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function foodProduct () : HasMany
    {
        return $this->hasMany(FoodProduct::class);
    }

    public function type () : BelongsTo
    {
        return $this->belongsTo(CategoryType::class);
    }
}
