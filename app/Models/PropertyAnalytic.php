<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PropertyAnalytic
 *
 * @property int $id
 * @property int $property_id
 * @property int $analytic_type_id
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyAnalytics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyAnalytics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyAnalytics query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyAnalytics whereAnalyticTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyAnalytics whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyAnalytics whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyAnalytics wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyAnalytics whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyAnalytics whereValue($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Property $property
 */
class PropertyAnalytic extends Model
{
    //
    protected $guarded = [];

    
    public function property()
    {
        return $this->belongsTo(\App\Models\Property::class);
    }


}
