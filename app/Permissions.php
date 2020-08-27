<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Models\Permission;

class Permissions extends Permission implements Auditable
{
    use \OwenIt\Auditing\Auditable;
}