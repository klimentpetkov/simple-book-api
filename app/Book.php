<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class,'author_id','id');
    }

    public function path()
    {
        return url('/books/' . $this->id);
    }
}
