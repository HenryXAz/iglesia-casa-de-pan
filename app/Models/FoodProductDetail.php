<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FoodProductDetail extends Model
{
    use HasFactory;

    // relations
    public function foodProduct () : BelongsTo
    {
        return $this->belongsTo(FoodProduct::class);
    }
}
