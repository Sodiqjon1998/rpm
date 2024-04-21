<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

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
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereLessonPerMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Group extends Model
{
    use HasFactory;

    public $mulitple = [];

    protected $table = "groups";

    public static function getTeacher($id)
    {
        $teacher = User::find($id);
        return $teacher;
    }

    public static function getGroup($id)
    {
        $group = self::find($id);
        return $group->name;
    }

    public static function getAllStudents($group)
    {
        $items = DB::table('group_item')
            ->where('group_id', '=', $group->id)
            // ->where('finished_at', '=', null)
            // ->where('status', '=', GroupItem::STATUS_FINISHED)
            ->pluck('student_id');

        return DB::table('users')
            ->where('user_type', '=', 4)
            ->whereNotIn('id', $items)
            ->get();
    }

    public static function getStudent($id)
    {
        return DB::table('users')
            ->where('id', '=', $id)
            ->first();
    }

    public static function getPupils($id)
    {
        $count = DB::table('group_item')
            ->where('group_id', '=', $id)
            ->where('finished_at', '=', null)
            ->count();

        return $count;
    }


    public static function getPupilsFinishedCount($id)
    {
        $count = DB::table('group_item')
            ->where('group_id', '=', $id)
            ->where('finished_at', '!=', null)
            ->count();

        return $count;
    }

    /**
     * @return void
     * All courses
     */
    public static function getAllCourses()
    {
        return Course::where('status', '=', 1)->get();
    }


    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function groupItems():HasMany
    {
        return $this->hasMany(GroupItem::class,'group_id', 'id');
    }
}
