<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Prescription extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
}
