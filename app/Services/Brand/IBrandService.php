<?php

namespace App\Services\Brand;

use Illuminate\Http\Request;

interface IBrandService
{
    public function getPaginatedBrands(Request $request);

    public function storeBrand($request);

    public function getBrandById($id);

    public function updateBrand($request);

    public function deleteBrand($request);
}