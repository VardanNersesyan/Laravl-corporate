<?php

namespace Corp\Http\Controllers;

use Corp\Repositories\ArticlesRepository;
use Corp\Repositories\PortfoliosRepository;
use Corp\Repositories\SlidersRepository;
use Illuminate\Http\Request;

class IndexController extends SiteController
{
    public function __construct(SlidersRepository $s_rep, PortfoliosRepository $p_rep, ArticlesRepository $a_rep)
    {
        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

        $this->p_rep = $p_rep;
        $this->s_rep = $s_rep;
        $this->a_rep = $a_rep;

        $this->bar = 'right';
        $this->template = config('settings.THEME').'.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = $this->getPortfolio();
        $content = view(config('settings.THEME').'.content')->with('portfolios',$portfolios)->render();
        $this->vars = array_add($this->vars,'content',$content);

        $sliderItems = $this->getSliders();
        $sliders = view(config('settings.THEME').'.slider')->with('sliders',$sliderItems)->render();
        $this->vars = array_add($this->vars,'sliders',$sliders);

        $articles = $this->getArticles();
        $this->contentRightBar = view(config('settings.THEME').'.indexBar')->with('articles',$articles)->render();

        $this->keywords = 'Home page';
        $this->meta_description = 'Home page';
        $this->title = 'Home page';

        return $this->renderOutput();
    }

    protected function getArticles()
    {
        $articles = $this->a_rep->get([
            'title', 'created_at','img','alias'
        ],config('settings.home_articles_count'));

        return $articles;
    }

    protected function getPortfolio()
    {
        $portfolio = $this->p_rep->get('*',config('settings.home_port_count'));

        if($portfolio->isEmpty()) {
            return FALSE;
        }




        return $portfolio;
    }

    public function getSliders()
    {
        $sliders = $this->s_rep->get();

        if($sliders->isEmpty()) {
            return FALSE;
        }

        $sliders->transform(function ($item, $key) {
            $item->img = config('settings.slider_path').'/'.$item->img;
            return $item;
        });

        return $sliders;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
