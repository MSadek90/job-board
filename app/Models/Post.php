<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 


class Post extends Model
{
    protected $table = "post_schema";
    protected $fillable = ['title','author','description','is_active'];

    public function comments(){
        return $this->hasMany((Comment::class));
    }

    public function tags(){
        return $this->belongsToMany(Tags::class);
    }
}
