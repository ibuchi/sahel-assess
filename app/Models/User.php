<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Resources\UserResource;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'country_id',
        'name',
        'email',
        'password',
        'phone',
        'photo',
        'address'
    ];

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

    /**
     * Get the user's country
     *
     * @return BelongsTo
     *
     */
    public function country() : BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the User's companies
     *
     * @return HasMany
     *
     */
    public function companies() : HasMany
    {
        return $this->hasMany(Company::class);
    }

    /**
     * Get the services for the user.
     *
     * @return HasMany
     *
     */
    public function services() : HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function token(): Attribute
    {
        return Attribute::get(
            fn () => [
                'value'  => $this->createToken("Personal access token")->plainTextToken,
                'type'    => 'Bearer',
                'expires_at' => now()->addMinutes(config('sanctum.expiration'))->toDateTimeString()
            ]
        );
    }

    public function loginDetails(): UserResource
    {
        return new UserResource($this->append('token'));
    }
}
