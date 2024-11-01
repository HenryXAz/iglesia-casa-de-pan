<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Account extends Model
{
    use HasFactory;

    // relations
    public function transactions () : MorphMany
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }
}
