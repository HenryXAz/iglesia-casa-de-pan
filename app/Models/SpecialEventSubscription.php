<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpecialEventSubscription extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
    ];

    protected  $table = 'special_events_subscriptions';

    // relations
    public function event () : BelongsTo
    {
        return $this->belongsTo(SpecialEvent::class, 'special_event_id');
    }

    public function user () : BelongsTo
    {
        return  $this->belongsTo(User::class);
    }
}
