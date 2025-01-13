<?php

namespace App\Http\Controllers\Web\Blog;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;

class BlogController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->all();

        return view('FrontEnd.blog.blog', ['categories' => $categories]);
    }
    public function show()
    {
        $categories = $this->categoryRepository->all();

        return view('FrontEnd.blog.blog-details', ['categories' => $categories]);
    }
}
