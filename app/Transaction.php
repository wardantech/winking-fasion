<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        "user_id","account_id","date","reference","description","credit","debit","transaction"
    ];
}
