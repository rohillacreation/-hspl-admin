<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EngineerAsset extends Model
{
    protected $table='engineer_asset';
    protected $fillable=[ 'AssetId','EngineerId','AssetCategoryId','AssignDate','ItemSerialNo','ItemDescription','ItemPrice','CreatedAt','UpdatedAt'];
}
