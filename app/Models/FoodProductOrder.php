<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FoodProductOrder extends Model
{
    use HasFactory;

    // relations
    public function foodProduct(): BelongsTo
    {
        return $this->belongsTo(FoodProduct::class);
    }

    public function customer () : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function delivery () : BelongsTo
    {
        return $this->belongsTo(User::class, 'delivery_user_id');
    }

}
