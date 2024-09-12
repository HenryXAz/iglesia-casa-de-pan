<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class PersonalAccount extends Model
{
    use HasFactory;

    // relations
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transactions () : MorphMany
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }
}
