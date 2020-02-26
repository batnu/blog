<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [ 'comment','name_user', 'post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
    public function scopeComment($query)
    {
        $query->whereNotNull('created_at')
            ->where('created_at', '>=', Carbon::now())
            ->latest('created_at');
    }
}
