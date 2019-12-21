<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'author',
        'email',
        'photo',
        'body',
        'is_active'
    ];

    public function replies()
    {
        return $this->hasMany('App\CommentReply');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
