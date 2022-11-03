<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForwaringLetter extends Model
{
    public function account(){
        return $this->belongsTo(Account::class, 'account_id');
    }
    public function export(){
        return $this->belongsTo(Export::class, 'export_id');
    }
}
