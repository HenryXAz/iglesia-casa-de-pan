<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MemberOptionalInformation extends Model
{
    use HasFactory;

    protected $casts = [
        'birthday' => 'date',
    ];

    protected $guarded = [
        'id',
        'created_at',
    ];


    protected $table = 'members_optional_information';

    // relations
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}
