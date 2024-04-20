<?php

namespace App\Models\Teacher;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Group;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $teacher_id
 * @property int $lesson_per_month
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $course_id
 * @property-read \App\Models\Course $course
 * @method static \Illuminate\Database\Eloquent\Builder|GroupTeacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupTeacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupTeacher query()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupTeacher whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupTeacher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupTeacher whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupTeacher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupTeacher whereLessonPerMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupTeacher whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupTeacher whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupTeacher whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupTeacher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupTeacher whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class GroupTeacher extends Group
{

    public static function find(){
        return parent::query()->where('teacher_id', Auth::user()->id);
    }
}
