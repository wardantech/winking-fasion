<?php

namespace App;

use App\Export;
use Illuminate\Database\Eloquent\Model;

class CommercialInvoice extends Model
{
    public function export(){
        return $this->belongsTo(Export::class, 'export_id');
    }
}
