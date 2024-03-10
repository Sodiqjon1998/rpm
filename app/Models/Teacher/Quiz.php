<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Quiz extends \App\Models\Quiz
{
    use HasFactory;

    public static function find(){
        return static::query()->where('teacher_id', '=', Auth::user()->id);
    }
}
