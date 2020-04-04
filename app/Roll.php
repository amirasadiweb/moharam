<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roll extends Model
{
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function givePermesiionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }
}
