<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
      'title', 'desc', 'img',
    ];
}
