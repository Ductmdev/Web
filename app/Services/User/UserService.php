<?php

namespace App\Services\User;

use App\Repositories\User\IUserRepository;

class UserService implements IUserService
{
    protected $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsersWithPagination($search = null, $perPage = 5, $currentPage = 1)
    {
        $users = $this->userRepository->getUsers($search, $perPage);

        $totalUsers = $users->total();
        $startResult = ($currentPage - 1) * $perPage + 1;
        $endResult = min($startResult + $perPage - 1, $totalUsers);

        return [
            'users' => $users,
            'startResult' => $startResult,
            'endResult' => $endResult,
            'totalResults' => $totalUsers
        ];
    }

    public function getUserById($id)
    {
        return $this->userRepository->getUserById($id);
    }

    public function storeUser($data)
    {
        return $this->userRepository->createUser($data);
    }

    public function updateUser($id, $data)
    {
        return $this->userRepository->updateUser($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->userRepository->deleteUser($id);
    }
}