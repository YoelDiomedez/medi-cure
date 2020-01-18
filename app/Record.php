<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Record extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    public function attention()
    {
        return $this->belongsTo(Attention::class)->select(['id', 'patient_id', 'employee_id']);
    }

    public function diagnoses()
    {
        return $this->belongsToMany(Diagnosis::class)
                    ->select('record_id', 'diagnosis_id', 'code', 'disease')
                    ->withPivot('type')
                    ->withTrashed();
    }
}
