<?php

namespace App\Services\User;

interface IUserService 
{
    public function getUsersWithPagination($search = null, $perPage = 5, $currentPage = 1);

    public function getUserById($id);

    public function storeUser($data);

    public function updateUser($id, $data);
    
    public function deleteUser($id);
}