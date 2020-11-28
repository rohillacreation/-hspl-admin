<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EngineerDesignationMaster extends Model
{
    protected $table='engineer_designation_master';
    protected $fillable=[ 'EngineerDesignationId','EngineerDesignationName','EngineerDesignationStatus','CreatedAt','UpdatedAt'];
}