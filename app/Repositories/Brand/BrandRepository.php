<?php

namespace App\Repositories\Brand;

use App\Models\Brand;
use App\Repositories\Base\BaseRepository;

class BrandRepository extends BaseRepository implements IBrandRepository
{
    public function getModel(): string
    {
        return Brand::class;
    }

    public function getTotalBrands()
    {
        return Brand::count();
    }

    public function getPaginatedBrands($search, $perPage)
    {
        $query = Brand::orderBy("id", "asc");

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        return $query->paginate($perPage);
    }

    public function storeBrand($name)
    {
        Brand::create(['name' => $name]);
    }

    public function getBrandById($id)
    {
        return Brand::findOrFail($id);
    }

    public function updateBrand($id, $name)
    {
        $brand = Brand::findOrFail($id);
        $brand->name = $name;
        $brand->save();
    }

    public function deleteBrand($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
    }
}
