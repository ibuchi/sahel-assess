<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'country_id',
        'name',
        'email'
    ];

    /**
     * Get the user that owns the company
     *
     * @return BelongsTo
     *
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the country that owns the company
     *
     * @return BelongsTo
     *
     */
    public function country() : BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    public function services() : HasMany
    {
        return $this->hasMany(Service::class);
    }
}
