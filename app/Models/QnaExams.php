<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $question_id
 * @property int $question_item_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|QnaExams newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QnaExams newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QnaExams query()
 * @method static \Illuminate\Database\Eloquent\Builder|QnaExams whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QnaExams whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QnaExams whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QnaExams whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QnaExams whereQuestionItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QnaExams whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QnaExams whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Answer> $answers
 * @property-read int|null $answers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\QuestionItem> $questionItems
 * @property-read int|null $question_items_count
 * @mixin \Eloquent
 */
class QnaExams extends Model
{
    use HasFactory;

    protected $table = "qna_exams";


    public function questionItems(){
        return $this->hasMany(QuestionItem::class,'id','question_item_id');
    }

    public function answers(){
        return $this->hasMany(Answer::class,'item_id', 'question_item_id');
    }
}
