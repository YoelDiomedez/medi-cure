<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use OwenIt\Auditing\Contracts\Auditable;

class Diagnosis extends Model implements Auditable
{
    use SoftDeletes, \OwenIt\Auditing\Auditable;
}
