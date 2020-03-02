<?php

namespace Oxygencms\Users\Models;

use Oxygencms\Uploads\Traits\HasUploads;
use Oxygencms\Core\Traits\HasMediaDefinitions;
use Oxygencms\Core\Traits\HasTemporaryMedia;
use Oxygencms\Core\Traits\MediaMethods;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Oxygencms\Core\Traits\CommonQueries;
use Oxygencms\Core\Traits\CommonAccessors;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasMedia
{
    use Notifiable,
        HasRoles,
        CommonQueries,
        CommonAccessors,
        LogsActivity,
        CausesActivity,
        HasUploads, # added for backward compatibility
        MediaMethods,
        HasMediaDefinitions,
        HasTemporaryMedia,
        HasMediaTrait {
            HasMediaDefinitions::registerMediaCollections insteadof HasMediaTrait;
            HasMediaDefinitions::registerMediaConversions insteadof HasMediaTrait;
            HasMediaDefinitions::mapMediaUrls insteadof HasMediaTrait;
        }

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'active', 'email_verified_at',
    ];

    /**
     * Logged attributes.
     *
     * @var bool $logUnguarded
     */
    protected static $logAttributes = [
        'name', 'email', 'phone', 'active',
    ];

    /**
     * This attributes should be guarded.
     *
     * @var array
     */
    protected $guarded = ['roles', 'password_confirmation'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return HasOne
     */
    public function socialLogin(): HasOne
    {
        return $this->hasOne(SocialLogin::class);
    }
}
