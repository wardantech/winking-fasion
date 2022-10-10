<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable =[
        "name", "is_active",
    ];

    public function branches()
    {
    	return $this->hasMany('App/BankBranch');

    }
}
