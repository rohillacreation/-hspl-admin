<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDesignationMaster extends Model
{
    protected $table = 'users_designation_master';
    protected $fillable = ['UserDesignationId', 'UserDesignationName', 'UserDesignationStatus', 'CreatedAt', 'UpdatedAt' ];
}
