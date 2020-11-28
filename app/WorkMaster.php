<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkMaster extends Model
{
    protected $table='work_master';
    protected $fillable=['WorkId','WorkName','WorkStatus','CreatedAt','UpdatedAt'];
}