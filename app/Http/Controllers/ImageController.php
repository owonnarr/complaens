<?php

namespace App\Http\Controllers;

use App\Image;
use App\Http\Helpers\HelperImage;
use Symfony\Component\HttpFoundation\Request;

class ImageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form()
    {
        return view('image.add_page');
    }

    /**
     * загрузка изображений
     * @param Request $request
     */

    public function upload(Request $request)
    {
        # правила для валидации данных
        $aRules = [
          'name' => 'required|max:20',
          'description' => 'required|max:60',
          'image' => 'required|mimes:jpeg,jpg,png',
        ];
        # валидация
        $this->validate($request, $aRules);

        $aData = [];
        $aData = $request->all();

        # работа с изображением
        $image = $request->file('image');

        $aData['image'] = HelperImage::handleImage($image);
        $aData['font'] = 'Aria';
        $aData['watermark'] = 'template';

        if ($aData['image'] !== false && $aData['image'] !== null) {
            Image::create($aData);

            return redirect(route('home'));
        } else {
            echo 'Ошибка при сохранении изображения';
        }

    }

    public function show()
    {

    }
}
