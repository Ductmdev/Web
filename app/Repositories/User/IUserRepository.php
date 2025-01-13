<?php

namespace App\Repositories\User;

use App\Repositories\Base\IBaseRepository;

interface IUserRepository extends IBaseRepository
{
    public function getUsers($search = null, $perPage = 5);

    public function getUserById($id);

    public function createUser($data);

    public function updateUser($id, $data);

    public function deleteUser($id);
}