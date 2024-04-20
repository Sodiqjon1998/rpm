<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * 
 *
 * @property int $id
 * @property int $group_id
 * @property int $student_id
 * @property int $started_at
 * @property int|null $finished_at
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GroupItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupItem whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupItem whereFinishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupItem whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupItem whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupItem whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupItem whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupItem whereUpdatedBy($value)
 * @mixin \Eloquent
 */
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
