<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Lab extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    public function patient()
    {
        return $this->belongsTo(Patient::class)
                    ->withTrashed();
    }
    
    public function user()
    {
        return $this->belongsTo(User::class)
                    ->select(['id', 'patient_id', 'specialty', 'cmp', 'rne'])
                    ->withTrashed();
    }

    public function service()
    {
        return $this->belongsTo(Service::class)->withTrashed();
    }
}
