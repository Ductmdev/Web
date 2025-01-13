<?php

namespace App\Services\Slider;

use App\Repositories\Slider\ISliderRepository;

class SliderService implements ISliderService
{
    protected $sliderRepo;

    public function __construct(ISliderRepository $iSliderRepository)
    {
        $this->sliderRepo = $iSliderRepository;
    }

    public function getSlidersWithPagination($search = null, $perPage = 5, $currentPage = 1)
    {
        $sliders = $this->sliderRepo->getAllSliders($search, $perPage);

        $totalSliders = $sliders->total();
        $startResult = ($currentPage - 1) * $perPage + 1;
        $endResult = min($startResult + $perPage - 1, $totalSliders);

        return [
            'sliders' => $sliders,
            'startResult' => $startResult,
            'endResult' => $endResult,
            'totalResults' => $totalSliders
        ];
    }

    public function storeSlider($file)
    {
        $fileExtension = $file->getClientOriginalExtension();
        $filename = "slider-" . time() . "." . $fileExtension;
        $file->move("admin/assets/images/sliders", $filename);

        return $this->sliderRepo->createSlider($filename);
    }

    public function updateSlider($id, $file)
    {
        $fileExtension = $file->getClientOriginalExtension();
        $filename = "slider-" . $id . "." . $fileExtension;
        $file->move("admin/assets/images/sliders", $filename);

        return $this->sliderRepo->updateSlider($id, $filename);
    }

    public function deleteSlider($id)
    {
        $this->sliderRepo->deleteSlider($id);
    }

    public function getSliderById($id)
    {
        return $this->sliderRepo->getSliderById($id);
    }
}