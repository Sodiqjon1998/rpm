<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $attempt_id
 * @property int $question_item_id
 * @property int $answer_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAnswer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAnswer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAnswer query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAnswer whereAnswerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAnswer whereAttemptId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAnswer whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAnswer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAnswer whereQuestionItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAnswer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamsAnswer whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class ExamsAnswer extends Model
{
    use HasFactory;

    protected $table = 'exams_answer';
}
