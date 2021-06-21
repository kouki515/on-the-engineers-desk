<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class device extends Model
{
    protected $primaryKey = 'itemCode';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
