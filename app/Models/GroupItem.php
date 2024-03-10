<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GroupItem extends Model
{
    public const STATUS_ACTIVE = 1;
    public const STATUS_FINISHED = 2;

    use HasFactory;

    protected $table = "group_item";


    public static function getStatuses(): array
    {
        return [
            self::STATUS_ACTIVE => 'Faol',
            self::STATUS_FINISHED => 'Yakunladi',
        ];
    }

    public function renderStatus(): string
    {
        return self::getStatuses()[$this->status];
    }

    public function getStudent()
    {
        return $this->hasOne(User::class, 'student_id');
    }

    public static function getStudentOne($id)
    {
        return DB::table('users')->where('id', '=', $id)->first();
    }

    public static function getGroup($id)
    {
        return DB::table('groups')->where('id', '=', $id)->first();
    }
}
