<?php

namespace App\Repositories\Category;

use App\Repositories\Base\IBaseRepository;

interface ICategoryRepository extends IBaseRepository
{
    public function getAllCategories($perPage, $search = null);

    public function createCategory($name);

    public function updateCategory($id, $name);

    public function deleteCategory($id);
}
