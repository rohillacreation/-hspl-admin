<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MachineMaster extends Model
{
    protected $table='machine_master';
    protected $fillable=['MachineId','MachineCategoryId','MachineSubcategoryId','RailwaysId','DevisionId','ClientName','MachineName','MachineSerialNumber','MachineOrderNo','MachineDescription','MachineWarranty','MachineWarrantyFrom','MachineWarrantyTo','MachineAllotmentDate','MachineStatus','CreatedAt','UpdatedAt'];
}
