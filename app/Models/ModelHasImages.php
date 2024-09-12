<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ModelHasImages extends Model
{
    use HasFactory;

    protected $table = 'model_has_images';

    // relations
    public function images () : MorphTo
    {
        return  $this->morphTo();
    }
}
