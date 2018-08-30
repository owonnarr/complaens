<?php
/**
 * Created by PhpStorm.
 * User: owonnarr
 * Date: 23.08.18
 * Time: 11:56
 */

namespace App\Http\Helpers;
use App\Image as Img;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class HelperImage
{
    const PATH_IMAGES = 'public/images/';

    /**
     * работа с сохранением изображения
     * @param $image
     * @return bool
     */
    public static function handleImage($image)
    {
            # хешируем имя изображения для записи в бд
            $filename = $image->hashName();

            $path = storage_path().'/app/'.self::PATH_IMAGES;

            # проверяем существует ли директория, если нет - создаем с правами
            if (file_exists($path)) {

                 return $image->move($path, $filename);

            } else {
                # создаем директорию
                $makeDir = Storage::makeDirectory(self::PATH_IMAGES, 0755, true);

                if ($makeDir == true) {

                    return $image->move($path, $filename);
                }
            }
        }

}