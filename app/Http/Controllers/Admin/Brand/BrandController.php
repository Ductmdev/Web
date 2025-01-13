<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\AddBrandRequest;
use App\Http\Requests\Brand\EditBrandRequest;
use App\Services\Brand\IBrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brandService;

    public function __construct(IBrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index(Request $request)
    {
        $brands = $this->brandService->getPaginatedBrands($request);

        return view('Admin.brand.brand', $brands);
    }

    public function create()
    {
        return view('Admin.brand.brand-create');
    }

    public function store(AddBrandRequest $request)
    {
        $this->brandService->storeBrand($request);

        return redirect("/quantri/brand")->with("alert", "Đã thêm thành công");
    }

    public function show($id)
    {
        $brand = $this->brandService->getBrandById($id);

        return view('Admin.brand.brand', compact('brand'));
    }

    public function edit($id)
    {
        $brand = $this->brandService->getBrandById($id);

        return view('Admin.brand.brand-edit', compact('brand'));
    }

    public function update(EditBrandRequest $request)
    {
        $this->brandService->updateBrand($request);

        return redirect("/quantri/brand")->with("alert", "Đã sửa thành công");
    }

    public function destroy(Request $request)
    {
        $this->brandService->deleteBrand($request);
        
        return redirect("/quantri/brand")->with("alert", "Đã xóa thành công");
    }
}
