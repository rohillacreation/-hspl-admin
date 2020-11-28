<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceMaster extends Model
{
    protected $table = 'service_master';
    protected $fillable = ['ServiceId','TaskNumber','RailwaysId','DivisionId','MachineCategoryId','MachineSubcategoryId','MachineId','Warranty','ServiceLocation','LetterReceivingDate','ServiceLetter','ServiceDocuments','EngineerId','ServiceStatus','EngineerComment','VehicleNumber','CreatedAt','UpdatedAt'];
}
