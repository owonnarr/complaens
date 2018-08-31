<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';
    public $timestamps = false;

    protected $fillable = ['id', 'name', 'image', 'description', 'font', 'watermark'];

    /**
     * @param $id
     * @return mixed
     */
    public function getImage($id)
    {
        if($id) {
            return Image::find($id);
        }
    }
}
