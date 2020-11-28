<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnicalDescription extends Model
{
    protected $table='technical_description';
    protected $fillable = ['DescriptionId','WorkId','MachineCategoryId','MachineSubcategoryId','MachineId','DescriptionTitle','DescriptionFile','DescriptionFile','DescriptionFile','UpdatedAt'];
}
