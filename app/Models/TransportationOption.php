<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransportationOption extends Model
{
    use HasFactory;

    // relations
    public function event () : BelongsTo
    {
        return $this->belongsTo(SpecialEvent::class);
    }
}
