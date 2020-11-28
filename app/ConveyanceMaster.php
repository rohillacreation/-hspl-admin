<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConveyanceMaster extends Model
{
    protected $table='conveyance_master';
    protected $fillable=['ConveyanceId','KMRange','ConveyanceAllowance','ConveyanceStatus','CreatedAt','UpdatedAt'];
}