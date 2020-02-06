<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserProfile
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $address
 * @property string|null $city
 * @property string|null $country
 * @property string|null $about
 * @property string|null $dob
 * @property string|null $photo
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereUserId($value)
 * @mixin \Eloquent
 */
class UserProfile extends Model
{

    public $fillable = [
        'address', 'city', 'country', 'dob'
    ];

    /**
     * Получение возраста
     * @return int|void
     */
    public function getAge()
    {
        if (!$this->dob) {
            return;
        }
        $dobArr = explode('-', $this->dob);
        $y = $dobArr[0];
        $m = $dobArr[1];
        $d = $dobArr[2];
        if ($m > date('m') || $m == date('m') && $d > date('d')) {
            return (int)(date('Y') - $y - 1);
        } else {
            return (int)(date('Y') - $y);
        }
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function uploadPhoto()
    {
        return '';
    }

    public function getPhoto()
    {
        return '';
    }
}
