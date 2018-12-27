<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = 'operators';
    
    protected $fillable = ['coverage_id','operator_name','operator_code','operator_description','price','country_code','status'];
}


