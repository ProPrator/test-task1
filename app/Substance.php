<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Substance extends Model
{
    use SoftDeletes;

    public function medicines()
    {
        return $this->belongsToMany('App\Medicine');
    }
}
