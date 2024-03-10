<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends \App\Models\Question
{
    use HasFactory;

    public static function find($quiz_id){
        return static::query()->orWhere('quiz_id', '=', $quiz_id);
    }
}
