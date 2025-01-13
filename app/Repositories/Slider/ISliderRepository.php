<?php

namespace App\Repositories\Slider;

use App\Repositories\Base\IBaseRepository;

interface ISliderRepository extends IBaseRepository
{
    public function getAllSliders($search = null, $perPage = 5);

    public function getSliderById($id);

    public function createSlider($filename);

    public function updateSlider($id, $filename);

    public function deleteSlider($id);
}