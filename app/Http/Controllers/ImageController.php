<?php

namespace App\Http\Controllers;

use App\Image;
use App\Http\Helpers\HelperImage;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Storage;

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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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

    /**
     * @param $id
     */

    public function show($id)
    {

        $oImg = new Image();
        $img = $oImg->getImage($id);

//        dd(Storage::url($img->image));

        if (is_object($img)) {
            return view('image.view_page', [
                'image' => $img
            ]);
        }
    }
}
