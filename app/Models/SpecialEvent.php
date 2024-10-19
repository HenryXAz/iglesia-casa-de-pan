<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SpecialEvent extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
    ];

    // relations
    public function creator () : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subscriptions () : HasMany
    {
        return $this->hasMany(SpecialEventSubscription::class);
    }

    public function transportationOptions () : HasMany
    {
        return $this->hasMany(TransportationOption::class);
    }
}
