<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'title', 'path', 'parent',
    ];

    public function delete(array $option = [])
    {
        self::where('parent', $this->id)->delete();

        return parent::delete($option);
    }
}
