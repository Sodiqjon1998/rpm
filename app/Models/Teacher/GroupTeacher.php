<?php

namespace App\Models\Teacher;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Group;

class GroupTeacher extends Group
{

    public static function find(){
        return parent::query()->where('teacher_id', Auth::user()->id);
    }
}
