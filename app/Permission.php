<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function rolls()
    {
        return $this->belongsToMany(Roll::class);
    }
}
