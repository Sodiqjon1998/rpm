<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $question
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Answer> $answers
 * @property-read int|null $answers_count
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionItem whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionItem whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionItem whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionItem whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class QuestionItem extends Model
{
    use HasFactory;

    public function answers(){
        return $this->hasMany(Answer::class, 'item_id', 'id');
    }

    public static function getQuestion($id){
        return self::findOrFail($id);
    }
}
