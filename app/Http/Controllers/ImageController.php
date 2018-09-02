<?php

namespace App\Http\Controllers;

use App\Image;
use App\Http\Helpers\HelperImage;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Storage;
use Share;

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
          'image' => 'required|mimes:jpeg,jpg',
        ];
        # валидация
        $this->validate($request, $aRules);

        $aData = [];
        $aData = $request->all();

        # работа с изображением
        $image = $request->file('image');

        $font = $request->get('font');
        $color = $request->get('color');
        $watermark = $request->get('watermark');

        $helperImage = new HelperImage($color, $font, $watermark);

        $aData['image'] = $helperImage->handleImage($image);
        $aData['font'] = $font;
        $aData['watermark'] = $watermark;
        $aData['color'] = $color;

        if ($aData['image'] !== false && $aData['image'] !== null) {

            $id = Image::create($aData)->id;
            return redirect('show'."/{$id}");

        } else {
            echo 'Ошибка при сохранении изображения';
        }

    }

    /**
     * @param $id
     */

    public static function show($id)
    {

        $oImg = new Image();
        $img = $oImg->getImage($id);

        $link = getenv('APP_URL').'/show/'.$img->id;
        if (is_object($img) && !empty($img) && $img != null) {
            return view('image.view_page', [
                'image' => $img,
                'share' => Share::page($link, 'Поделиться')
                    ->facebook()
                    ->twitter()
                    ->googlePlus()
                    ->linkedin('Extra linkedin summary can be passed here')
            ]);
        }
    }

}
