<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Repositories\PortfoliosRepository;
class PortfolioController extends SiteController
{
    public function __construct(PortfoliosRepository $p_rep)
    {
        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

        $this->p_rep = $p_rep;
        $this->template = config('settings.THEME').'.portfolios';
    }

    public function index()
    {
        $this->title = 'Portfolio';
        $this->keywords = 'Portfolio';
        $this->meta_description = 'Portfolio';

        $portfolios = $this->getPortfolios();

        $content = view(config('settings.THEME') . '.portfolios_content')->with('portfolios',$portfolios)->render();
        $this->vars = array_add($this->vars,'content',$content);

        return $this->renderOutput();
    }

    public function getPortfolios($take = FALSE, $paginate = TRUE,$random = FALSE)
    {
        $portfolios = $this->p_rep->get('*',$take,$paginate,FALSE, $random);

        if($portfolios) {
            $portfolios->load('filter');
        }

        return $portfolios;
    }

    public function show($alias)
    {
        $portfolio = $this->p_rep->one($alias);

        $this->title = $portfolio->title;
        $this->keywords = $portfolio->keywords;
        $this->meta_description = $portfolio->meta_desc;

        $portfolios = $this->getPortfolios(config('settings.other_portfolios'),FALSE, TRUE);

        $content = view(config('settings.THEME').'.portfolio_content')->with(['portfolio'=>$portfolio,'portfolios'=>$portfolios])->render();
        $this->vars = array_add($this->vars,'content',$content);

        return $this->renderOutput();
    }
}
