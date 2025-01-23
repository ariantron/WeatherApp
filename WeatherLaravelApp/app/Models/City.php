<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string $latitude
 * @property string $longitude
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder<static>|City newModelQuery()
 * @method static Builder<static>|City newQuery()
 * @method static Builder<static>|City query()
 * @method static Builder<static>|City whereCreatedAt($value)
 * @method static Builder<static>|City whereId($value)
 * @method static Builder<static>|City whereLatitude($value)
 * @method static Builder<static>|City whereLongitude($value)
 * @method static Builder<static>|City whereName($value)
 * @method static Builder<static>|City whereUpdatedAt($value)
 * @mixin Eloquent
 */
class City extends Model
{
    protected $fillable = [
        'name',
        'latitude',
        'longitude'
    ];
}
