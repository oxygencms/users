<?php

namespace Oxygencms\Users\Models;

use Oxygencms\Core\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialLogin extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider', 'provider_id',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
