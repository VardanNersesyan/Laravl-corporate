<?php

namespace Corp\Http\Controllers\Admin;

use Corp\Http\Requests\SliderRequest;
use Corp\Repositories\SlidersRepository;
use Corp\Slider;
use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Gate;

class SliderController extends AdminController
{
    protected $slider_rep;

    public function __construct(SlidersRepository $slider_rep)
    {
        parent::__construct();

        $this->slider_rep = $slider_rep;

        $this->template = config('settings.THEME').'.admin.slider';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('VIEW_SLIDER')) {
            abort(403);
        }

        $this->title = 'Slider manager';

        $slider = $this->getSlider();

        $this->content = view(config('settings.THEME').'.admin.slider_content')->with('slider',$slider)->render();

        return $this->renderOutput();
    }

    public function getSlider()
    {
        return $this->slider_rep->get('*',FALSE,FALSE,FALSE,FALSE,TRUE);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('VIEW_SLIDER')) {
            abort(403);
        }

        $this->title = 'Add new slide';

        $this->content = view(config('settings.THEME').'.admin.slider_create_content')->render();

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $result = $this->slider_rep->addSlide($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('/admin')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        if(Gate::denies('VIEW_SLIDER')) {
            abort(403);
        }

        $this->title = 'Edit slide - ' . $slider->title;

        $this->content = view(config('settings.THEME').'.admin.slider_create_content')->with('slide',$slider)->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        $result = $this->slider_rep->updateSlider($request, $slider);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('/admin')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $result = $this->slider_rep->deleteSlider($slider);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('/admin')->with($result);
    }
}
