<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EngineerOnSite extends Model
{
    protected $table='engineer_on_site';
    protected $fillable=['OnSiteId','EngineerId','FromDate','ToDate','TotalDays','OnSiteStatus','CreatedAt','UpdatedAt'	];
}