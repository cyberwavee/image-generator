<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use GmagickDraw;
use Gmagick;

class ImageGeneratorController
{
    public function generateImage()
    {
        \Imagick::getHomeURL();
        dd($this->gen());
    }

    protected function gen()
    {
// Создаем объект GmagickDraw

        $draw = new \ImagickDraw();


// Установить цвет

        $draw->setFillColor('red');


// Устанавливаем ширину и высоту изображения

        $draw->setStrokeWidth(1);

// Функция рисования линии

        for($x = 0; $x < 40; $x++) {

            $draw->line(rand(0, 100), rand(0, 60), rand(0, 500), rand(0, 500));

            $draw->line(rand(0, 100), rand(0, 60), rand(0, 500), rand(0, 500));

            $draw->line(rand(0, 100), rand(0, 60), rand(0, 500), rand(0, 500));

            $draw->line(rand(0, 100), rand(0, 60), rand(0, 500), rand(0, 500));

        }

        $gmagick = new \Imagick();

        $gmagick->newImage(500, 500, 'White');

        $gmagick->setImageFormat("png");


// Установить цвет

        $draw->setFillColor('Black');

        $draw->setFontSize(25);


// Использование функции drawimage

        $gmagick->drawImage($draw);

        $gmagick->annotateImage($draw, 5, 120, 0,

            'GeeksforGeeks: A computer science portal');


// Отображение выходного изображения

        header("Content-Type: image/png");

        echo $gmagick->getImageBlob();

//        $data = GmagickDraw::line(2,3,2,1);
//
//        file_put_contents(storage_path('/tmp/image.png'), $data);

    }
}