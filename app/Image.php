<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';
    public $timestamps = false;

    protected $fillable = ['id', 'name', 'image', 'description', 'font', 'watermark'];
}
