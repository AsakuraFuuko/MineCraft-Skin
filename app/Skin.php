<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skin extends Model
{
    protected $table = 'skins';

    public function mcid()
    {
        return $this->belongsTo(MCID::class, 'id');
    }
}
