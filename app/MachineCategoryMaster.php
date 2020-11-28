<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MachineCategoryMaster extends Model
{
    protected $table='machine_category_master';
    protected $fillable=['MachineCategoryId','MachineCategoryName','MachineCategoryStatus','CreatedAt','UpdatedAt'];
}
		