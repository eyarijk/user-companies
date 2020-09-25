<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserCompany
 * @package App\Models
 * @property int id
 * @property int user_id
 * @property int company_id
 * @property \DateTime join_at
 * @property \DateTime finish_at
 * @property User user
 * @property User company
 */
class UserCompany extends Model
{
    protected $casts = [
        'join_at' => 'datetime',
        'finish_at' => 'datetime',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class,'company_id','id');
    }
}
