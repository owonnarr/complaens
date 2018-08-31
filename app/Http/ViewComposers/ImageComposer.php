<?php
/**
 * Created by PhpStorm.
 * User: owonnarr
 * Date: 31.08.18
 * Time: 10:40
 */

namespace App\Http\ViewComposers;
use App\Image;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Route;
use App\Http\Controllers\ImageController;

class ImageComposer
{

    protected $id;
    protected $image;

    public function __construct()
    {
        $this->id = Route::current()->parameters();
        if (!empty($this->id)) {
            $this->image = ImageController::show($this->id)->getData()['image'][0];
        }

    }

    public function compose(View $view)
    {
        if (empty($this->image)) {
            $view->with('image', $this->image);
        }

    }

}