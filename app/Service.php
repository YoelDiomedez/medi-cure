<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use OwenIt\Auditing\Contracts\Auditable;

class Service extends Model implements Auditable
{
    use SoftDeletes, \OwenIt\Auditing\Auditable;
}
