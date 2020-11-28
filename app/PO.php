<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PO extends Model
{
    protected $table='po_table';
    protected $fillable=['PoId','OrganisationId','Company','RailwaysId','DevisionId','CompanyName','Address','PONumber','PODate','PartyName','PartyMobile','PartyEmail','GSTNumber','TotalAmount','TotalGstAmount','GrandTotal','TotalinWords','CreatedAt','UpdatedAt'];
}
