<?php

namespace App\Models\Teacher;

use App\Models\ExamsAttempt;
use App\Models\QnaExams;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property int $quiz_id
 * @property string $date
 * @property string $time
 * @property int $created_by
 * @property int $updated_by
 * @property int $attempt
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Teacher\Quiz $quiz
 * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereAttempt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuizId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedBy($value)
 * @property string $enterance_id
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereEnteranceId($value)
 * @mixin \Eloquent
 */
class Question extends \App\Models\Question
{
    use HasFactory;

    public static function find($quiz_id)
    {
        return static::query()->orWhere('quiz_id', '=', $quiz_id);
    }


    public function quiz():BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public function createdBy():HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function getQnaExam():HasMany
    {
        return $this->hasMany(QnaExams::class, 'question_id', 'id');
    }



    protected $appends = ['attempt_counter'];

    public $count = 0;

    public function getIdAttributes($value)
    {
        $attemptCount = ExamsAttempt::where(['exam_id' => $value, 'user_id' => \Auth::user()->id])->count();
        $this->count = $attemptCount;
        return $this->count;
    }

    public function getAttemptCounterAttribute()
    {
        return $this->count;
    }
}
