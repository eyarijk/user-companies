<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Company
 * @package App\Models
 * @property int id
 * @property int country_id
 * @property string name
 * @property \DateTime|null created_at
 * @property \DateTime|null updated_at
 * @property Country country
 */
class Company extends Model
{
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
