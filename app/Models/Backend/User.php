<?php

namespace App\Models\Backend;

use Illuminate\Support\Facades\Auth;

class User extends \App\Models\User{
    public static function find(){
        return static::query()->where('id', '<>', Auth::user()->id)->where('user_type', '!=', 4);
    }
}
