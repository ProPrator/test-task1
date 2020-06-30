<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    public function substances()
    {
        return $this->belongsToMany('App\Substance');
    }
}
