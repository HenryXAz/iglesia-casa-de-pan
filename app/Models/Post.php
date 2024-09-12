<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
    ];

    // relations
    public function user () : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public  function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images () : MorphMany
    {
        return $this->morphMany(ModelHasImages::class, 'images');
    }
}
