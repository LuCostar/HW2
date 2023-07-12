<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function collection(){
        return $this->hasMany('App\Models\Favourite');
    }
    
}
