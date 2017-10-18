<?php

namespace Corp\Http\Controllers\Admin;

use Corp\Http\Requests\PortfolioRequest;
use Corp\Portfolio;
use Corp\Repositories\PortfoliosRepository;
use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Gate;

class PortfoliosController extends AdminController
{
    public function __construct(PortfoliosRepository $p_rep)
    {
        parent::__construct();

        $this->p_rep = $p_rep;

        $this->template = config('settings.THEME').'.admin.portfolios';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('VIEW_PORTFOLIO')) {
            abort(403);
        }

        $this->title = 'Portfolios manager';

        $portfolios = $this->getPortfolios();

        $this->content = view(config('settings.THEME').'.admin.portfolios_content')->with('portfolios',$portfolios)->render();

        return $this->renderOutput();
    }

    public function getPortfolios()
    {
        return $this->p_rep->get('*',FALSE,FALSE,FALSE,FALSE,TRUE);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('VIEW_PORTFOLIO')) {
            abort(403);
        }

        $this->title = 'Add new project to portfolio';

        $this->content = view(config('settings.THEME').'.admin.portfolios_create_content')->render();

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {
        $result = $this->p_rep->addPortfolio($request);

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
    public function edit(Portfolio $portfolio)
    {
        if(Gate::denies('VIEW_PORTFOLIO')) {
            abort(403);
        }

        $portfolio->img = json_decode($portfolio->img);

        $this->title = 'Edit portfolio - ' . $portfolio->title;

        $this->content = view(config('settings.THEME').'.admin.portfolios_create_content')->with(['portfolio'=>$portfolio])->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        $result = $this->p_rep->updatePortfolio($request, $portfolio);

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
    public function destroy(Portfolio $portfolio)
    {
        $result = $this->p_rep->deletePortfolio($portfolio);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('/admin')->with($result);
    }
}
