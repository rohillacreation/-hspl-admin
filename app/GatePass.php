<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GatePass extends Model
{
    protected $table='gate_pass_detail';
    protected $fillable=['GatePassId','OrganisationId','RailwaysId','DevisionId','CompanyName','Address','SINumber','Date','GatePassType','DesignationName','Organisation','PersonName','DestinationMaterial','ReasonTakingOut','OfficerName','Designation','Department','CreatedAt','UpdatedAt'];
}
