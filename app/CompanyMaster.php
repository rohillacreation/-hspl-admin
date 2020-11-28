<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyMaster extends Model
{
    protected $table='company_master';
    protected $fillable=['CompanyId','CompanyName','CompanyLocation','CompanyAddress','CreatedAt','UpdatedAt'];
}
