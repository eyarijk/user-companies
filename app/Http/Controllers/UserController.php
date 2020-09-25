<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCompany;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserController constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getByCountryName(Request $request): JsonResponse
    {
        $name = $request->query->get('name');

        abort_if(!$name,JsonResponse::HTTP_BAD_REQUEST, 'Query parameter "name" is required');

        $users = $this
            ->userRepository
            ->findByCountryName($name)
            ->map(function (User $user) {
                $companies = $user->companies->map(function (UserCompany $userCompany) {
                    return [
                        'id' => $userCompany->company_id,
                        'name' => $userCompany->company->name,
                        'join_at' => $userCompany->join_at,
                        'finish_at' => $userCompany->finish_at,
                    ];
                });

                return array_merge(
                    $user->toArray(),
                    [
                        'companies' => $companies,
                    ]
                );
            })
        ;


        return new JsonResponse([
            'users' => $users,
        ]);
    }
}
