<?php

namespace Corp\Http\Controllers\Admin;

use Gate;
use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Auth;
use Menu;

class AdminController extends \Corp\Http\Controllers\Controller
{
    protected $p_rep;
    protected $a_rep;
    protected $cat_rep;
    protected $user;
    protected $template;
    protected $content = FALSE;
    protected $title;
    protected $vars;

    public function __construct()
    {
        /*$this->user = Auth::user();
        if(!$this->user) {
            abort(403);
        }*/
    }

    public function renderOutput()
    {
        $this->vars = array_add($this->vars,'title',$this->title);

        $menu = $this->getMenu();
        $navigation = view(config('settings.THEME').'.admin.navigation')->with('menu',$menu)->render();
        $this->vars = array_add($this->vars,'navigation',$navigation);

        if($this->content) {
            $this->vars = array_add($this->vars,'content',$this->content);
        }

        $footer = view(env('THEME').'.admin.footer')->render();
        $this->vars = array_add($this->vars,'footer',$footer);

        return view($this->template)->with($this->vars);
    }

    public function getMenu()
    {
        return Menu::make('adminMenu', function($menu) {

            if(Gate::allows('VIEW_ADMIN_ARTICLES')) {
                $menu->add('Articles', array('route' => 'admin.articles.index'));
            }
            /*
             * todo same for all menu partitions
             * */

            $menu->add('Portfolio',  array('route'  => 'admin.articles.index'));
            $menu->add('Menu',  array('route'  => 'admin.menus.index'));
            $menu->add('Users',  array('route'  => 'admin.users.index'));
            $menu->add('Access',  array('route'  => 'admin.permissions.index'));
        });
    }
}
