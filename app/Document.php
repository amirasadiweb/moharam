<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Document extends Model
{

    public static function boot()
    {
        parent::boot();
        
        static::updating(function($document){
            $document->adjusments()->attach(Auth::id(),
                [
                    'before'=>Json_encode(array_intersect_key($document->fresh()->toArray(),$document->getDirty()
                    ))
                    ,
                    'after'=>Json_encode($document->getDirty())
                ]
            );
            return 'ok';
            });
    }


    public function adjusments()
    {
      return  $this->belongsToMany(User::class,'adjusments')
          ->withTimestamps()
          ->withPivot(['before','after'])
          ->latest('pivot_updated_at')
          ;
    }
}
