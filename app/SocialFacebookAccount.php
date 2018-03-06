<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialFacebookAccount extends Model
{

    /**
     * The attribut that is the name table.
     *
     * @var string
     */
    protected $table = 'social_facebook_accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'provider_user_id',
        'provider'
    ];

    /**
     * The function get user relation belongsTo.
     *
     * @return \stdClass
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
