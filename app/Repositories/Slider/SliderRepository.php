<?php

namespace App\Repositories\Slider;

use App\Models\Slider;
use App\Repositories\Base\BaseRepository;

class SliderRepository extends BaseRepository implements ISliderRepository
{
    public function getModel(): string
    {
        return Slider::class;
    }

    public function getAllSliders($search = null, $perPage = 5)
    {
        $query = $this->model->orderBy("id", "asc");

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        return $query->paginate($perPage);
    }

    public function getSliderById($id)
    {
        return Slider::find($id);
    }

    public function createSlider($filename)
    {
        $slider = new Slider();
        $slider->path = $filename;
        $slider->save();
        return $slider;
    }

    public function updateSlider($id, $filename)
    {
        $slider = Slider::find($id);
        if ($slider) {
            $slider->path = $filename;
            $slider->save();
        }
        return $slider;
    }

    public function deleteSlider($id)
    {
        $slider = Slider::find($id);
        if ($slider) {
            $file_name = $slider->path;
            if ($file_name != '') {
                unlink('admin/assets/images/sliders/' . $file_name);
            }
            $slider->delete();
        }
    }
}