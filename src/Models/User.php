<?php

namespace Oxygencms\Users\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Oxygencms\Uploads\Traits\HasUploads;
use Oxygencms\Core\Traits\CommonQueries;
use Oxygencms\Core\Traits\CommonAccessors;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,
        HasRoles,
        HasUploads,
        CommonQueries,
        CommonAccessors,
        LogsActivity,
        CausesActivity;

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
