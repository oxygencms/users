<?php

namespace Oxygencms\Users\Models;

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
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasMedia
{
    use Notifiable,
        HasRoles,
        CommonQueries,
        CommonAccessors,
        LogsActivity,
        MediaMethods,
        CausesActivity,
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
        'name', 'email', 'phone', 'password', 'active',
    ];

    /**
     * This attributes should be guarded.
     *
     * @var array
     */
    protected $guarded = ['roles'];

    /**
     * Logged attributes.
     *
     * @var bool $logUnguarded
     */
    protected static $logAttributes = [
        'name', 'email', 'phone', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function socialLogin()
    {
        return $this->hasOne(SocialLogin::class);
    }
}
