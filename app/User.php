<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

//   
    public function owns($related)
    {
        return $this->id==$related->id;
    }

    public function rolls()
    {
        return $this->belongsToMany(Roll::class);
    }

    public function hasRoll($roll)
    {
        if(is_string($roll)){
            return $this->rolls->contains('name',$roll);
        }
        
        return !! $roll->intersect($this->rolls)->count();

//     foreach ($roll as $r){
//         if($this->hasRoll($r->name)){
//             return true;
//         }
//
//     }
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }



}
