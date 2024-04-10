<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Group extends Model
{
    use HasFactory;

    public $mulitple = [];

    protected $table = "groups";

    public static function getTeacher($id)
    {
        $teacher = User::find($id);
        return $teacher->name;
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

}
