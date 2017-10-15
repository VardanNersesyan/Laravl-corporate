<?php

namespace Corp\Http\Controllers\Admin;

use Gate;
use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Auth;

class IndexController extends AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->template = config('settings.THEME').'.admin.index';
    }

    public function index()
    {
        if(Gate::denies('VIEW_ADMIN')) {
            abort(403);
        }

        $this->title = 'Admin panel';

        return $this->renderOutput();
    }
}
