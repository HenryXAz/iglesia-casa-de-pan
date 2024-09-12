<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ModelHasImage extends Model
{
    use HasFactory;

    protected $table = 'model_has_image';

    // relations
    public function image () : MorphTo
    {
        return $this->morphTo();
    }

}
