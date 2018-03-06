<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeUserPost extends Model
{
    /**
     * The attribut that is the name table.
     *
     * @var string
     */
    protected $table = 'like_user_posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'post_id',
        'like',
    ];

}
