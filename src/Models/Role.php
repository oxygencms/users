<?php

namespace Oxygencms\Users\Models;

use Oxygencms\Core\Traits\CommonQueries;
use Oxygencms\Core\Traits\CommonAccessors;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use CommonAccessors, CommonQueries, LogsActivity;

    /**
     * Logged attributes.
     *
     * @var bool $logUnguarded
     */
    protected static $logUnguarded = true;
}
