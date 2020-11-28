<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveManagement extends Model
{
    protected $table='leave_management';
    protected $fillable=['LeaveId','EngineerId','FromDate','ToDate','TotalLeaves','LeaveStatus','CreatedAt','UpdatedAt'];
}