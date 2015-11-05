<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * Relationship: Checkins
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function checkins()
    {
        return $this->hasMany('App\Checkin');
    }

}