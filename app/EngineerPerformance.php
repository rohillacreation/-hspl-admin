<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EngineerPerformance extends Model
{
    protected $table='engineer_performance';
    protected $fillables=['PerformanceId','EngineerId','MachineDependent','ReviewPoints','Punctuality','Feedback','CreatedAt','UpdatedAt'];
}
