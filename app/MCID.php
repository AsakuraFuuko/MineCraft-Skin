<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCID extends Model
{
    protected $fillable = [
        'mcid', 'genuine',
    ];

    protected $table = 'mcids';

    public function skin()
    {
        return $this->hasOne(Skin::class, 'mcid_id');
    }

    public function cape()
    {
        return $this->hasOne(Cape::class, 'mcid_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
