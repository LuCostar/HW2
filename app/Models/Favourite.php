<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    public function belonging(){
        return $this->belongsTo('App\Models\Account');
    }
}
