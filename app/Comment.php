<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [ 'comment','name_user', 'post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
