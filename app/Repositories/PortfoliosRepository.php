<?php

namespace Corp\Repositories;
use Corp\Portfolio;
use Image;
use Gate;
use Config;


class PortfoliosRepository extends Repository {

    public function __construct(Portfolio $portfolio)
    {
        $this->model = $portfolio;
    }

    public function one($alias,$attr = array())
    {
        $portfolio = parent::one($alias,$attr);

        if($portfolio && $portfolio->img) {
            $portfolio->img = json_decode($portfolio->img);
        }

        return $portfolio;
    }

    public function addPortfolio($request)
    {
        if(Gate::denies('save', $this->model)) {
            abort(403);
        }

        $data = $request->except('_token','image');

        if(empty($data)) {
            return ['error'=>'No data'];
        }

        if(empty($data['alias'])) {
            $data['alias'] = $this->transliterate($data['title']);
        }

        if($this->one($data['alias'],FALSE)) {
            $request->marge(array('alias'=>$data['alias']));
            $request->flash();
            return ['error' => 'This alias is allready used'];
        }

        if($request->hasFile('image')) {
            $image = $request->file('image');

            if($image->isValid()) {
                $str = str_random(8);

                $obj = new \stdClass;
                $obj->mini = $str . '_mini.jpg';
                $obj->max  = $str . '_max.jpg';
                $obj->path = $str . '.jpg';

                $img = Image::make($image);

                $img->fit(Config::get('settings.image')['width'],
                    Config::get('settings.image')['height'])
                    ->save(public_path().'/'.Config::get('settings.THEME').'/images/projects/'.$obj->path);

                $img->fit(Config::get('settings.portfolios_img')['max']['width'],
                    Config::get('settings.portfolios_img')['max']['height'])
                    ->save(public_path().'/'.Config::get('settings.THEME').'/images/projects/'.$obj->max);

                $img->fit(Config::get('settings.portfolios_img')['mini']['width'],
                    Config::get('settings.portfolios_img')['mini']['height'])
                    ->save(public_path().'/'.Config::get('settings.THEME').'/images/projects/'.$obj->mini);

                $data['img'] = json_encode($obj);

                $this->model->fill($data);

                if($this->model->save()) {
                    return ['status'=>'Material added'];
                } else {
                    return ['error'=>'Error material not added'];
                }
            }
        }
    }

    public function updatePortfolio($request, $portfolio)
    {
        if(Gate::denies('edit', $this->model)) {
            abort(403);
        }

        $data = $request->except('_token','image','_method');


        if(empty($data)) {
            return ['error'=>'No data'];
        }

        if(empty($data['alias'])) {
            $data['alias'] = $this->transliterate($data['title']);
        }

        $result = $this->one($data['alias'],FALSE);

        if(isset($result->id) && ($result->id != $portfolio->id)) {
            $request->marge(array('alias'=>$data['alias']));
            $request->flash();
            return ['error' => 'This alias is allready used'];
        }

        if($request->hasFile('image')) {
            $image = $request->file('image');

            if($image->isValid()) {
                if(isset($portfolio->img)) {
                    $this->delImg(json_decode($portfolio->img),'projects');
                }
                $str = str_random(8);

                $obj = new \stdClass;
                $obj->mini = $str . '_mini.jpg';
                $obj->max  = $str . '_max.jpg';
                $obj->path = $str . '.jpg';

                $img = Image::make($image);

                $img->fit(Config::get('settings.image')['width'],
                    Config::get('settings.image')['height'])
                    ->save(public_path().'/'.Config::get('settings.THEME').'/images/projects/'.$obj->path);

                $img->fit(Config::get('settings.articles_img')['max']['width'],
                    Config::get('settings.articles_img')['max']['height'])
                    ->save(public_path().'/'.Config::get('settings.THEME').'/images/projects/'.$obj->max);

                $img->fit(Config::get('settings.articles_img')['mini']['width'],
                    Config::get('settings.articles_img')['mini']['height'])
                    ->save(public_path().'/'.Config::get('settings.THEME').'/images/projects/'.$obj->mini);

                $data['img'] = json_encode($obj);
            }
        }

        $portfolio->fill($data);

        if($portfolio->update()) {
            return ['status'=>'Material updated'];
        } else {
            return ['error'=>'Error material not updated'];
        }
    }

    public function deletePortfolio($portfolio)
    {
        if(Gate::denies('destroy', $portfolio)) {
            abort(403);
        }

        if(isset($portfolio->img)) {
            $this->delImg(json_decode($portfolio->img),'projects');
        }

        if($portfolio->delete()) {
            return ['status'=>'Material deleted'];
        } else {
            return ['error'=>'Error material not deleted'];
        }
    }
}
