<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class FoodProduct extends Model
{
    use HasFactory;

    public function  casts()
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    protected $guarded = [
        'id',
        'created_at',
    ];

    // relations
    public function creator () : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function details () : HasMany
    {
        return $this->hasMany(FoodProductDetail::class);
    }

    public function orders () : HasMany
    {
        return $this->hasMany(FoodProductOrder::class);
    }

    public function category () : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images () : MorphMany
    {
        return $this->morphMany(ModelHasImages::class, 'immageable');
    }
}
