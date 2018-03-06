<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The attribut that is the name table.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'description',
        'name',
        'user_id',
        'slug',
    ];

    /**
     * The function get user relation belongsTo.
     *
     * @return \stdClass
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * The function get user relation belongsToMany abaut likes user.
     *
     * @return \stdClass
     */
    public function users() 
    {
        return $this->belongsToMany('App\User','like_user_posts','post_id','user_id');
    }

    /**
     * The function get like with relation hasMany.
     *
     * @return \stdClass
     */
    public function likes() 
    {
        return $this->hasMany('App\LikeUserPost')->where('like', 1);
    }

    /**
     * The function get dislike with relation hasMany.
     *
     * @return \stdClass
     */
    public function dislikes() 
    {
        return $this->hasMany('App\LikeUserPost')->where('like', 0);
    }

}
