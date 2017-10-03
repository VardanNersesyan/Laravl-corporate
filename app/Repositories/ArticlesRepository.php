<?php

namespace Corp\Repositories;
use Corp\Article;
use Corp\Menu;


class ArticlesRepository extends Repository
{
    public function __construct(Article $articles)
    {
        $this->model = $articles;
    }
}