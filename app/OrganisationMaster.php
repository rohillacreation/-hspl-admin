<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganisationMaster extends Model
{
    protected $table = 'organisation_master';
    protected $fillable = ['OrganisationId','OrganisationName','OrganisationStatus'];
}
