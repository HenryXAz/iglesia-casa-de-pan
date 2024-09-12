<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpecialEventSubscription extends Model
{
    use HasFactory;

    // relations
    public function event () : BelongsTo
    {
        return $this->belongsTo(SpecialEvent::class);
    }

    public function user () : BelongsTo
    {
        return  $this->belongsTo(User::class);
    }
}
