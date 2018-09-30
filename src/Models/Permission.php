<?php

namespace Oxygencms\Users\Models;

use Oxygencms\Core\Traits\CommonQueries;
use Oxygencms\Core\Traits\CommonAccessors;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use CommonAccessors, CommonQueries;
}
