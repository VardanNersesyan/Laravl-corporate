<?php

namespace Corp\Http\Controllers\Admin;

use Corp\Article;
use Corp\Category;
use Corp\Http\Requests\ArticleRequest;
use Corp\Repositories\ArticlesRepository;
use Corp\Repositories\CategoriesRepository;
use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Gate;

class ArticlesController extends AdminController
{
    public function __construct(ArticlesRepository $a_rep, CategoriesRepository $cat_rep)
    {
        parent::__construct();

        $this->cat_rep = $cat_rep;
        $this->a_rep = $a_rep;

        $this->template = config('settings.THEME').'.admin.articles';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('VIEW_ARTICLES')) {
            abort(403);
        }

        $this->title = 'Articles manager';

        $articles = $this->getArticles();
        $this->content = view(config('settings.THEME').'.admin.articles_content')->with('articles',$articles)->render();

        return $this->renderOutput();
    }

    public function getArticles()
    {
        return $this->a_rep->get('*',FALSE,FALSE,FALSE,FALSE,TRUE);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('VIEW_ARTICLES')) {
            abort(403);
        }

        $this->title = 'Add new article';

        $categories = $this->getCategory();

        $lists = array();
        foreach ($categories as $category) {
            if($category->parent_id == 0) {
                $lists[$category->title] = array();
            } else {
                $lists[$categories->where('id',$category->parent_id)->first()->title][$category->id] = $category->title;
            }
        }

        $this->content = view(config('settings.THEME').'.admin.articles_create_content')->with('categories',$lists)->render();

        return $this->renderOutput();
    }

    public function getCategory()
    {
        return $this->cat_rep->get(['title','alias','parent_id','id']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $result = $this->a_rep->addArticle($request);

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
    public function edit(Article $article)
    {
        if(Gate::denies('VIEW_ARTICLES')) {
            abort(403);
        }

        $article->img = json_decode($article->img);

        $categories = $this->getCategory();

        $lists = array();
        foreach ($categories as $category) {
            if($category->parent_id == 0) {
                $lists[$category->title] = array();
            } else {
                $lists[$categories->where('id',$category->parent_id)->first()->title][$category->id] = $category->title;
            }
        }

        $this->title = 'Edit article - ' . $article->title;

        $this->content = view(config('settings.THEME').'.admin.articles_create_content')->with(['categories'=>$lists,'article'=>$article])->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $result = $this->a_rep->updateArticle($request, $article);

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
    public function destroy(Article $article)
    {
        $result = $this->a_rep->deleteArticle($article);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('/admin')->with($result);
    }
}
