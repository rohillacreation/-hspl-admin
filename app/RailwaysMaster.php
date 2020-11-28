<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RailwaysMaster extends Model
{
    protected $table = 'railways_master';
    protected $fillable = ['RailwaysId','RailwaysZone','RailwaysCode','RailwaysZoneHeadQuater','RailwaysStatus','CreatedAt','UpdatedAt'];
}
