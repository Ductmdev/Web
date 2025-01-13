<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Services\Slider\ISliderService;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $sliderService;

    public function __construct(ISliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = 5;
        $currentPage = $request->query('page', 1);

        $paginationData = $this->sliderService->getSlidersWithPagination($search, $perPage, $currentPage);

        return view('Admin.slider.index', [
            'sliders' => $paginationData['sliders'],
            'startResult' => $paginationData['startResult'],
            'endResult' => $paginationData['endResult'],
            'totalResults' => $paginationData['totalResults'],
        ]);
    }

    public function create()
    {
        return view('Admin.slider.slider-create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $this->sliderService->storeSlider($request->image);
            return redirect('/quantri/slider')->with('alert', 'Đã thêm thành công');
        }
    }

    public function edit(Request $request)
    {
        $slider = $this->sliderService->getSliderById($request->id);
        return view('Admin.slider.slider-edit', ['slider' => $slider]);
    }

    public function update(Request $request)
    {
        $this->sliderService->updateSlider($request->id, $request->image);
        return redirect('/quantri/slider')->with('alert', 'Đã sửa thành công');
    }

    public function destroy(Request $request)
    {
        $this->sliderService->deleteSlider($request->id);
        return redirect('/quantri/slider')->with('alert', 'Đã xóa thành công');
    }
}
