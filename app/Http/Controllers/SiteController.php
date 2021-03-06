<?php

namespace Corp\Http\Controllers;

use Corp\Repositories\MenusRepository;
use Illuminate\Http\Request;
use Menu;

class SiteController extends Controller
{
    protected $p_rep;
    protected $s_rep;
    protected $a_rep;
    protected $m_rep;

    protected $keywords;
    protected $meta_description;
    protected $title;

    protected $template;

    protected $vars = array();

    protected $contentRightBar = FALSE;
    protected $contentLefttBar = FALSE;

    protected $bar = 'no';

    public function __construct(MenusRepository $m_rep)
    {
        $this->m_rep = $m_rep;
    }

    protected function renderOutput()
    {
        $menu = $this->getMenu();

        $navigation = view(config('settings.THEME').'.navigation')->with('menu',$menu)->render();
        $this->vars = array_add($this->vars,'navigation',$navigation);

        if($this->contentRightBar) {
            $rightBar = view(config('settings.THEME') . '.rightBar')->with('content_rightBar',$this->contentRightBar)->render();
            $this->vars = array_add($this->vars,'rightBar',$rightBar);
        }

        if($this->contentLefttBar) {
            $leftBar = view(config('settings.THEME') . '.leftBar')->with('content_leftBar',$this->contentLefttBar)->render();
            $this->vars = array_add($this->vars,'leftBar',$leftBar);
        }

        $this->vars = array_add($this->vars,'bar',$this->bar);

        $this->vars = array_add($this->vars,'meta_description',$this->meta_description);
        $this->vars = array_add($this->vars,'title',$this->title);
        $this->vars = array_add($this->vars,'keywords',$this->keywords);

        $footer = view(config('settings.THEME') . '.footer')->render();
        $this->vars = array_add($this->vars,'footer',$footer);
        return view($this->template)->with($this->vars);
    }

    public function getMenu()
    {
        $menu = $this->m_rep->get();

        $mBuilder = Menu::make('MyNav', function ($m) use ($menu) {
            foreach ($menu as $item) {
                if ($item->parent == 0) {
                    $m->add($item->title,$item->path)->id($item->id);
                }
                else {
                    if($m->find($item->parent)) {
                        $m->find($item->parent)->add($item->title,$item->path)->id($item->id);
                    }
                }
            }
        });

        return $mBuilder;
    }
}
