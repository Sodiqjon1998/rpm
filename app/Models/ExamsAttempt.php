<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $exam_id
 * @property int $user_id
 * @property int $status
 * @property float|null $marks
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAttempt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAttempt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAttempt query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAttempt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAttempt whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAttempt whereExamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAttempt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAttempt whereMarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAttempt whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAttempt whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAttempt whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAttempt whereUserId($value)
 * @mixin \Eloquent
 */
class ExamsAttempt extends Model
{
    use HasFactory;

    protected $table = "exams_attempt";

    public $timestamps = false;

    public function examAnswers(){
        return $this->hasMany(ExamsAnswer::class, 'attempt_id', 'id');
    }

    public function exam(){
        return $this->hasOne(Question::class, 'id', 'exam_id');
    }

    public function answer(){
        return $this->hasOne(Answer::class, 'id', 'answer_id');
    }
}
