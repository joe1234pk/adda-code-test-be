<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AnalyticType
 *
 * @property int $id
 * @property string $name
 * @property string $units
 * @property int $is_numeric
 * @property int|null $num_decimal_place
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnalyticType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnalyticType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnalyticType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnalyticType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnalyticType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnalyticType whereIsNumeric($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnalyticType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnalyticType whereNumDecimalPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnalyticType whereUnits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnalyticType whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $num_decimal_places
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnalyticType whereNumDecimalPlaces($value)
 */
class AnalyticType extends Model
{
    //
    protected $guarded = [];

}
