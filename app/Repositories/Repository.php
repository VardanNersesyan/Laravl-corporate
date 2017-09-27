<?php

namespace Corp\Repositories;
use Config;


abstract class Repository
{
    protected $model = FALSE;

    public function get()
    {
        $builder = $this->model->select('*');

        return $builder->get();
    }
}