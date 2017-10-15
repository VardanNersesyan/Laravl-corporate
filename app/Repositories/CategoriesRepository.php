<?php

namespace Corp\Repositories;
use Corp\Category;
use Corp\Menu;


class CategoriesRepository extends Repository
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }
}