<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MachineSubCategoryMaster extends Model
{
    protected $table='machine_subcategory_master';
    protected $fillable=['MachineSubcategoryId ','MachineCategoryId','MachineSubcategoryName','MachineSubcategoryStatus','CreatedAt','UpdatedAt'];
}
