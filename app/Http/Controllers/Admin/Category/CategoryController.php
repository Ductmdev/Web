<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\AddCategoryRequest;
use App\Http\Requests\Category\EditCategoryRequest;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        $perPage = 5;
        $currentPage = request()->query('page', 1);
        $totalCategories = $this->categoryRepository->all()->count();
        $startResult = ($currentPage - 1) * $perPage + 1;
        $endResult = min($startResult + $perPage - 1, $totalCategories);

        $categories = $this->categoryRepository->getAllCategories($perPage, $request->search);

        return view('Admin.category.category', [
            "categories" => $categories,
            "startResult" => $startResult,
            "endResult" => $endResult,
            "totalResults" => $totalCategories,
        ]);
    }

    public function create()
    {
        return view('Admin.category.category-create');
    }

    public function store(AddCategoryRequest $request)
    {
        $this->categoryRepository->createCategory($request->name);
        return redirect("/quantri/category")->with("alert", "Đã thêm thành công");
    }

    public function edit(Request $request)
    {
        $category = $this->categoryRepository->all()->find($request->id);
        return view('Admin.category.category-edit', ["category" => $category]);
    }

    public function update(EditCategoryRequest $request)
    {
        $this->categoryRepository->updateCategory($request->id, $request->name);
        return redirect("/quantri/category")->with("alert", "Đã sửa thành công");
    }

    public function destroy(Request $request)
    {
        $this->categoryRepository->deleteCategory($request->id);
        return redirect("/quantri/category")->with("alert", "Đã xóa thành công");
    }
}

