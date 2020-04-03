<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Property
 *
 * @property int $id
 * @property string|null $guid
 * @property string $suburb
 * @property string $state
 * @property string $country
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AnalyticType[] $analytic_types
 * @property-read int|null $analytic_types_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PropertyAnalytic[] $analytics
 * @property-read int|null $analytics_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property whereGuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property whereSuburb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Property extends Model
{
    //
    protected $guarded = [];


    public function analytics()
    {
        return $this->hasMany(\App\Models\PropertyAnalytic::class,'property_id','id');
    }

    public function analytic_types()
    {
        return $this->belongsToMany(\App\Models\AnalyticType::class,'property_analytics','property_id','analytic_type_id')->withPivot('value');
    }
}
