<?php

namespace App\Services\Slider;

interface ISliderService
{
    public function getSlidersWithPagination($search = null, $perPage = 5, $currentPage = 1);

    public function storeSlider($file);

    public function updateSlider($id, $file);

    public function deleteSlider($id);
    
    public function getSliderById($id);
}