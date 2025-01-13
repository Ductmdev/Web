<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Base\BaseRepository;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{
    public function getModel(): string
    {
        return Category::class;
    }

    public function getAllCategories($perPage, $search = null)
    {
        $query = $this->model->orderBy("id", "asc");

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        return $query->paginate($perPage);
    }

    public function createCategory($name)
    {
        return $this->model->create(['name' => $name]);
    }

    public function updateCategory($id, $name)
    {
        $category = $this->model->findOrFail($id);
        $category->name = $name;
        $category->save();

        return $category;
    }

    public function deleteCategory($id)
    {
        $category = $this->model->findOrFail($id);
        $category->delete();
    }

    public function findByName($name)
    {
        return $this->model->where('name', $name)->first();
    }

    public function all()
    {
        return $this->model->all();
    }
}