<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogMaster extends Model
{
    protected $table='catalog_master';
    protected $fillable=['CatalogId','MachineCategoryId','MachineSubcategoryId','MachineId','CatalogDescription','CatalogFile','CatalogStatus','CreatedAt','UpdatedAt'];
}
