<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\Base\BaseRepository;

class UserRepository extends BaseRepository implements IUserRepository
{
    public function getModel(): string
    {
        return User::class;
    }

    public function getUsers($search = null, $perPage = 5)
    {
        $users = $this->model->orderBy('id', 'asc');

        if ($search) {
            $users->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        return $users->paginate($perPage);
    }

    public function getUserById($id)
    {
        return $this->model->find($id);
    }

    public function createUser($data)
    {
        return $this->model->create($data);
    }

    public function updateUser($id, $data)
    {
        $user = $this->model->find($id);
        $user->update($data);
        return $user;
    }

    public function deleteUser($id)
    {
        $user = $this->model->find($id);
        $user->delete();
        return $user;
    }

    public function getAllUsers()
    {
        return $this->model->all();
    }

}