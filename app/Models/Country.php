<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Get users for the country
     *
     * @return HasMany
     *
     */
    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the companies of the country
     *
     * @return HasMany
     *
     */
    public function companies() : HasMany
    {
        return $this->hasMany(Company::class);
    }
}
