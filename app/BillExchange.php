<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillExchange extends Model
{
    protected $fillable = [
        'drawn_under','export','export_date','invoice_no','invoice_date','amount'
    ];

}
