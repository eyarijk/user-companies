<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

/**
 * Class User
 * @package App\Models
 * @property int id
 * @property string name
 * @property string email
 * @property \DateTime|null email_verified_at
 * @property string password
 * @property string remember_token
 * @property \DateTime created_at
 * @property \DateTime updated_at
 * @property UserCompany[]|Collection companies
 */
class User extends Authenticatable
{
    public function companies(): HasMany
    {
        return $this->hasMany(UserCompany::class,'user_id','id');
    }
}
