<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    /**
     * @param string $name
     * @return Collection|User[]
     */
    public function findByCountryName(string $name): Collection;
}
