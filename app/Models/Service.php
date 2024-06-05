<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'company_id'
    ];

    /**
     * Get the user that owns the service
     *
     * @return BelongsTo
     *
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
