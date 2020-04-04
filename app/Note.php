<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable=['body'];
    public function card()
    {
        return $this->belongsTo(Card::calss);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function options()
    {
        return $this->belongsToMany(Option::class);
    }
}
