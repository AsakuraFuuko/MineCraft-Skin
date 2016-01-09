<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cape extends Model
{
    protected $table = 'capes';

    public function mcid()
    {
        return $this->belongsTo(MCID::class, 'id');
    }
}
