<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetCategoryMaster extends Model
{
    protected $table = 'asset_category_master';
    protected $fillable = ['AssetCategoryId','AssetCategoryName','AssetCategoryStatus', 'CreatedAt', 'UpdatedAt'];
}

