<?php
/**
 * Created by PhpStorm.
 * User: owonnarr
 * Date: 23.08.18
 * Time: 11:56
 */

namespace App\Http\Helpers;
//use App\Image as Img;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;


class HelperImage
{
    const PATH_IMAGES = 'public/images/';

    protected $fontPath = '/var/www/complaen/public/';
    protected $color;
    protected $font;
    protected $watermark;

    public function __construct($color, $font = 'arial', $watermark = 'Complaens')
    {

        $this->font = $font;
        $this->color = $color;
        $this->watermark = $watermark;

    }

    /**
     * @param $image
     * @return mixed
     */
    public function handleImage($file)
    {
        # путь к папке с пользовательскими фото
        $path = storage_path().'/app/'.self::PATH_IMAGES;
        # хешируем имя изображения для записи в бд
        $fileName = $file->hashName();
        $file->move($path, $fileName);

        # проверяем существует ли директория, если нет - создаем с правами
        if (file_exists($path)) {
            # перемещаем файл в нашу папку
            $this->setWatermark($path.$fileName);
        } else {
         # создаем директорию
            $makeDir = Storage::makeDirectory(self::PATH_IMAGES, 0755, true);

            if ($makeDir == true) {
                $this->setWatermark($path.$fileName);
            }
        }

        return $fileName;
    }

    public function setWatermark(string $pathImage)
    {
        $font = public_path("$this->font.ttf");
        # создаем новое изображение
        $image = imagecreatefromjpeg($pathImage);

        # создаем цвета для шрифта
        $black = imagecolorallocate($image, 255, 255, 255);
        $blue = imagecolorallocate($image, 56, 156, 255);
        $red = imagecolorallocate($image, 255, 36, 36);
        # проверяем какой пришел цвет
        switch ($this->color) {
            case '000000':
                $this->color = $black;
                break;
            case '002480':
                $this->color = $blue;
                break;
            case 'e50017':
                $this->color = $red;
                break;
            default: $this->color = $black;
        }
        # накладываем водяной знак на фото
        imagettftext($image, 35, 0, 300,300, $this->color, $font, $this->watermark);
        # создаем изображение
        Imagejpeg($image,$pathImage);
        ImageDestroy($image);

    }

}