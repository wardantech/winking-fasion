<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillExchange extends Model
{
    protected $fillable = [
        'drawn_under','export_id','export_date','invoice_no','invoice_date','amount'
    ];
    public function bank(){
        return $this->belongsTo(Bank::class, 'drawn_under');
    }
    
}
