<?php
/**
 * Created by PhpStorm.
 * User: owonnarr
 * Date: 31.08.18
 * Time: 10:40
 */

namespace App\Http\ViewComposers;
use Illuminate\Contracts\View\View;

class ImageComposer
{
    protected $srcImage;
    protected $title;
    protected $description;


    public function __construct()
    {
        $this->srcImage = 'src';
        $this->title = 'src';
        $this->description = 'src';
    }

    public function compose(View $view)
    {
        $view->with('image', [
            'src' => $this->srcImage,
            'title' => $this->title,
            'description' => $this->description,
        ]);
    }

}