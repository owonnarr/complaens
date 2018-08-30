<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Helpers\HelperImage;

class ImageController extends Controller
{
    public function form()
    {
        return view('image.add_page');
    }

    public function upload(Request $request)
    {
//
//        $aRules = [
//          'title' => 'required | max:30',
//          'description' => 'required|max:60',
//          'image' => 'required | mimes:jpeg,jpg,png | dimensions:max_width:800,max_height:800',
//        ];
//
//        $this->validate($request, $aRules);

        $aData = [];
        $aData = $request->all();

        # работа с изображением
        $image = $request->file('image');

        $aData['image'] = HelperImage::handleImage($image);
        dd($aData['image']);
        if ($aData['image'] !== false) {
            Image::create($aData);
        } else {
            echo 'Ошибка при сохранении изображения';
        }


    }
}
