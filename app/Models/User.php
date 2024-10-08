<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements \Illuminate\Contracts\Auth\MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;

    protected $guarded = [
        'id',
        'created_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
//    protected $fillable = [
//        'identifier',
//        'password',
//    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // relations
    public function image () : MorphOne
    {
        return $this->morphOne(ModelHasImage::class, 'image');
    }

    public function member () : HasOne
    {
        return $this->hasOne(Member::class);
    }

    public function posts () : HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function events () : HasMany
    {
        return $this->hasMany(SpecialEvent::class);
    }

    public function transactions () : HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function accounts () : HasMany
    {
        return $this->hasMany(PersonalAccount::class);
    }

    public function foodProducts () : HasMany
    {
        return $this->hasMany(FoodProduct::class);
    }

    public  function orders () : HasMany
    {
        return $this->hasMany(FoodProductOrder::class);
    }

    public function deliveries () : HasMany
    {
        return $this->hasMany(FoodProductOrder::class);
    }
}
