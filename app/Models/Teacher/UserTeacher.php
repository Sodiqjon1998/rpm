<?php

namespace App\Models\Teacher;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_type
 * @property string|null $img
 * @property string|null $phone
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereUserType($value)
 * @mixin \Eloquent
 */
class UserTeacher extends User
{
    public static function find(){
        return parent::query()
            ->where('id', '<>', Auth::user()->id)
            ->where('user_type', '=', 2);
    }
}
