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

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
