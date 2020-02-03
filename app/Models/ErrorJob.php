<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ErrorJob
 *
 * @property int $id
 * @property string $connection
 * @property string $queue
 * @property string $payload
 * @property string $exception
 * @property string $failed_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ErrorJob newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ErrorJob newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ErrorJob query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ErrorJob whereConnection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ErrorJob whereException($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ErrorJob whereFailedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ErrorJob whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ErrorJob wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ErrorJob whereQueue($value)
 * @mixin \Eloquent
 */
class ErrorJob extends Model
{
    public $table = 'failed_jobs';
}
