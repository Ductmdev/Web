<?php

namespace App\Repositories\Brand;

use App\Repositories\Base\IBaseRepository;

interface IBrandRepository extends IBaseRepository
{
    public function getTotalBrands();

    public function getPaginatedBrands($search, $perPage);

    public function storeBrand($name);

    public function getBrandById($id);

    public function updateBrand($id, $name);

    public function deleteBrand($id);
    
}
