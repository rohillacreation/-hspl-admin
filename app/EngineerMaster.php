<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EngineerMaster extends Model
{
	protected $table = 'engineer_master';
    protected $fillable = [ 'EngineerId', 'EmployeeId','EngineerName', 'AssignTo', 'EngineerDesignation', 'EngineerQualification', 'EngineerMobile', 'EngineerEmail', 'EngineerPassword', 'EngineerPermanentAddress', 'EngineerCurrentAddress', 'EngineerDocuments', 'DocumentDescription', 'EngineerLeaveStatus','EngineerTotalLeaves' ,'EngineerSiteStatus', 'EngineerStatus', 'CreatedAt', 'UpdatedAt' ];
}
