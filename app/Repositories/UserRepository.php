<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function findByCountryName(string $name): Collection
    {
        return User::query()
            ->with([
                'companies.company',
                'companies' => function (HasMany $hasMany) use ($name) {
                    return $hasMany
                        ->select('user_companies.*')
                        ->join('companies as c','c.id','=','user_companies.company_id')
                        ->join('countries as co','co.id','=','c.country_id')
                        ->where('co.name','=', $name)
                    ;
                },
            ])
            ->distinct()
            ->select('users.*')
            ->join('user_companies as uc','uc.user_id','=','users.id')
            ->join('companies as c','c.id','=','uc.company_id')
            ->join('countries as co','co.id','=','c.country_id')
            ->where('co.name','=', $name)
            ->get()
        ;
    }
}
