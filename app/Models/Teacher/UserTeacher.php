<?php

namespace App\Models\Teacher;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserTeacher extends User
{
    public static function find(){
        return parent::query()
            ->where('id', '<>', Auth::user()->id)
            ->where('user_type', '=', 2);
    }
}
