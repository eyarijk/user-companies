<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * Class Country
 * @package App\Models
 * @property int id
 * @property string name
 * @property Company[]|Collection companies
 */
class Country extends Model
{
    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function companies(): HasMany
    {
        return $this->hasMany(Company::class,'country_id','id');
    }
}
