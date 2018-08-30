<?php
/**
 * Created by PhpStorm.
 * User: owonnarr
 * Date: 23.08.18
 * Time: 11:56
 */

namespace App\Http\Helpers;
use App\Image as Img;
use Image;


class HelperImage
{
    const PATH_IMAGES = '/images/photos/';
    const SIZE_M = 'images/photos/';

    /**
     * проверка на существование директории
     * @param string $path
     * @return bool
     */
    public static function handleImage($image)
    {
        # путь к папке для сохранения изображений
        $path = public_path().self::PATH_IMAGES;

        # хешируем имя изображения для записи в бд
        $imageName = $image->hashName();

        # проверяем существует ли директория, если нет - создаем с правами
        if (!is_dir($path)) {

            mkdir($path, 0775);
            # перемещаем изображение с временной папки tmp для сохранения
            $image->move($path, $imageName);
        } else {
            return false;
        }
    }

}