<?php

namespace Corp\Repositories;
use Config;
use File;


abstract class Repository
{
    protected $model = FALSE;

    public function get($select = '*',$take = FALSE,$pagination = FALSE, $where = FALSE, $random = FALSE, $reverse = FALSE)
    {
        $builder = $this->model->select($select);

        if($reverse) {
            $builder->latest('id');
        }

        if($take) {
            $builder->take($take);
        }

        if($where) {
            $builder->where($where[0],$where[1]);
        }

        if($random) {
            $builder->inRandomOrder();
        }

        if($pagination) {
            return $this->check($builder->paginate(config('settings.paginate')));
        }

        return $this->check($builder->get());
    }

    protected function check($result)
    {
        if($result->isEmpty()) {
            return FALSE;
        }


        $result->transform(function ($item,$key) {
            if(is_string($item->img) && is_object(json_decode($item->img)) && (json_last_error() == JSON_ERROR_NONE) ) {
                $item->img = json_decode($item->img);
            }
            return $item;
        });

        return $result;
    }

    public function one($alias, $attr = array())
    {
        $result = $this->model->where('alias',$alias)->first();

        return $result;
    }

    public function transliterate($string)
    {
        $str = mb_strtolower($string, 'UTF-8');

        $letter_array = array(
            'a' => 'а',
            'b' => 'б',
            'v' => 'в',
            'g' => 'г,ґ',
            'd' => 'д',
            'e' => 'е,є,э',
            'jo' => 'ё',
            'zh' => 'ж',
            'z' => 'з',
            'i' => 'и,і',
            'ji' => 'ї',
            'j' => 'й',
            'k' => 'к',
            'l' => 'л',
            'm' => 'м',
            'n' => 'н',
            'o' => 'о',
            'p' => 'п',
            'r' => 'р',
            's' => 'с',
            't' => 'т',
            'u' => 'у',
            'f' => 'ф',
            'kh' => 'х',
            'ts' => 'ц',
            'ch' => 'ч',
            'sh' => 'ш',
            'shch' => 'щ',
            '' => 'ъ',
            'y' => 'ы',
            '' => 'ь',
            'yu' => 'ю',
            'ya' => 'я',
        );

        foreach ($letter_array as $letter => $kyr) {
            $kyr = explode(',',$kyr);
            $str = str_replace($kyr,$letter, $str);
        }

        $str = preg_replace('/(\s|[^A-Za-z0-9\-])+/','-', $str);
        $str = trim($str,'-');
        return $str;
    }

    public function delImg($fileNeme, $dir)
    {
        if (is_object($fileNeme)) {
            foreach ($fileNeme as $file) {
                File::delete(public_path().'/'.Config::get('settings.THEME').'/images/'.$dir.'/'.$file);
            }
        } else {
            File::delete(public_path().'/'.Config::get('settings.THEME').'/images/'.$dir.'/'.$fileNeme);
        }
    }
}