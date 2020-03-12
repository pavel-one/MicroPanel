<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Storage;

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

    public $timestamps = false;

    public $fillable = [
        'address', 'city', 'country', 'dob', 'photo'
    ];

    public const ALLOW_MIMES = [
        'image/jpeg', 'image/png'
    ];

    public const DISK_NAME = 'user';

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

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Загрузка аватарки
     * @param UploadedFile $file
     * @return bool
     * @throws \Exception
     */
    public function uploadPhoto(UploadedFile $file): bool
    {
        $mime = $file->getMimeType();
        if (!in_array($mime, self::ALLOW_MIMES, true)) {
            throw new \Exception('Данный тип файлов не поддерживается');
        }

        if (Storage::disk(self::DISK_NAME)->putFileAs($this->id, $file, 'avatar.jpg') === false) {
            throw new \Exception('Загрузка файла не удалась');
        }

        $patch = Storage::disk('user')->getAdapter()->applyPathPrefix($this->id.'/avatar.jpg');

        \Image::make($patch)->fit(400, 400)->save($patch, 80, 'jpg');

        $this->photo = $this->id.'/avatar.jpg';

        return $this->save();
    }

    /**
     * TODO: Получить фото
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function getPhoto()
    {
        if (!$this->photo) {
            $this->photo = 'no-photo.png';
        }
        $patch = Storage::disk('user')->getAdapter()->applyPathPrefix($this->photo);
        $file = File::get($patch);
        $mime = File::mimeType($patch);
//        return  File::mimeType($patch);
        return response($file, 200, [
            'Content-Type' => $mime
        ]);
    }

    /**
     * TODO: Получить путь к хранилищу
     */
    public function getUserStorage()
    {

    }
}
