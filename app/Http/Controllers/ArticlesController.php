<?php

namespace Corp\Http\Controllers;

use Corp\Repositories\MenusRepository;
use Illuminate\Http\Request;
use Corp\Repositories\ArticlesRepository;
use Corp\Repositories\PortfoliosRepository;

class ArticlesController extends SiteController
{
    public function __construct(PortfoliosRepository $p_rep, ArticlesRepository $a_rep)
    {
        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

        $this->p_rep = $p_rep;
        $this->a_rep = $a_rep;

        $this->bar = 'right';
        $this->template = config('settings.THEME').'.articles';
    }

    public function index()
    {
        $articles = $this->getArticles();

        $content = view(config('settings.THEME') . '.articles_content')->with('articles',$articles)->render();
        $this->vars = array_add($this->vars,'content',$content);
        return $this->renderOutput();
    }

    public function getArticles($alias = FALSE)
    {
        $articles = $this->a_rep->get([
            'title', 'alias', 'created_at', 'img', 'desc'
        ],FALSE,TRUE);

        if($articles) {
            //$articles->load('user','category','comments');
        }

        return $articles;
    }
}
