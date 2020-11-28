<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DivisionMaster extends Model
{
    protected $table='devision_master';
    protected $fillable=['DevisionId','RailwaysId','DevisionName','DevisionStatus','CreatedAt','UpdatedAt'];
}
