<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFollow extends Model
{
    //
    protected $fillable = [
    	'follower_id', 'followee_id'
    ];
}
