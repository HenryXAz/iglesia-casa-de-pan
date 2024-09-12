<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Transaction extends Model
{
    use HasFactory;

    // relations
    public function transactionable () : MorphTo
    {
        return $this->morphTo();
    }

    public function user () : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reason () : BelongsTo
    {
        return $this->belongsTo(TransactionReason::class);
    }
}
