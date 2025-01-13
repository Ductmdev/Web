<?php

namespace App\Services\Brand;

use App\Repositories\Brand\IBrandRepository;
use Illuminate\Http\Request;

class BrandService implements IBrandService
{
    protected $brandRepository;

    public function __construct(IBrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function getPaginatedBrands(Request $request)
    {
        $perPage = 5; 
        $currentPage = $request->query('page', 1); 
        $totalBrands = $this->brandRepository->getTotalBrands();

        $startResult = ($currentPage - 1) * $perPage + 1;
        $endResult = min($startResult + $perPage - 1, $totalBrands);

        $search = $request->input('search');
        $brands = $this->brandRepository->getPaginatedBrands($search, $perPage);

        return [
            "brands" => $brands,
            "startResult" => $startResult,
            "endResult" => $endResult,
            "totalResults" => $totalBrands,
        ];
    }

    public function storeBrand($request)
    {
        $this->brandRepository->storeBrand($request->name);
    }

    public function getBrandById($id)
    {
        return $this->brandRepository->getBrandById($id);
    }

    public function updateBrand($request)
    {
        $this->brandRepository->updateBrand($request->id, $request->name);
    }

    public function deleteBrand($request)
    {
        $this->brandRepository->deleteBrand($request->id);
    }
}