<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Member extends Model
{
    use HasFactory;

    protected $casts = [
        'fullname' => 'name last_name',
    ];

    protected $guarded = [
        'id',
        'created_at',
    ];

    // relations

   public function optionalInformation () : HasOne
   {
       return $this->hasOne(MemberOptionalInformation::class);
   }

   public function user() : BelongsTo
   {
       return $this->belongsTo(User::class);
   }
}
