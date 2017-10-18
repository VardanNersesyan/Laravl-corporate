<?php

namespace Corp\Repositories;
use Corp\Slider;
use Gate;
use Image;
use Config;


class SlidersRepository extends Repository
{
    public function __construct(Slider $slider)
    {
        $this->model = $slider;
    }

    public function addSlide($request)
    {
        if(Gate::denies('save', $this->model)) {
            abort(403);
        }

        $data = $request->except('_token','image');

        if(empty($data)) {
            return ['error'=>'No data'];
        }


        if($request->hasFile('image')) {
            $image = $request->file('image');

            if($image->isValid()) {
                $data['img'] = str_random(8) . '.jpg';

                $img = Image::make($image);

                $img->fit(Config::get('settings.slider_img')['width'],
                    Config::get('settings.slider_img')['height'])
                    ->save(public_path().'/'.Config::get('settings.THEME').'/images/slider-cycle/'.$data['img']);

                $this->model->fill($data);

                if($this->model->save()) {
                    return ['status'=>'Material added'];
                } else {
                    return ['error'=>'Error material not added'];
                }
            }
        }
    }

    public function updateSlider($request, $slider)
    {
        if(Gate::denies('edit', $this->model)) {
            abort(403);
        }

        $data = $request->except('_token','image','_method');

        if(empty($data)) {
            return ['error'=>'No data'];
        }

        if($request->hasFile('image')) {
            $image = $request->file('image');

            if($image->isValid()) {
                $data['img'] = str_random(8) . '.jpg';
                if(isset($data['old_image'])) {
                    $delRes = $this->delImg($data['old_image'],'slider-cycle');
                    if($delRes) {
                        unset($data['old_image']);
                    }
                }

                $img = Image::make($image);

                $img->fit(Config::get('settings.slider_img')['width'],
                    Config::get('settings.slider_img')['height'])
                    ->save(public_path().'/'.Config::get('settings.THEME').'/images/slider-cycle/'.$data['img']);
            }
        }
        $slider->fill($data);

        if($slider->update()) {
            return ['status'=>'Material updated'];
        } else {
            return ['error'=>'Error material not updated'];
        }
    }

    public function deleteSlider($slider)
    {
        if(Gate::denies('destroy', $slider)) {
            abort(403);
        }

        /*
         * TODO add delete old slider img system
         * */

        if($slider->delete()) {
            return ['status'=>'Material deleted'];
        } else {
            return ['error'=>'Error material not deleted'];
        }
    }
}