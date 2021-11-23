<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator;

use Imagick;
use ImagickDraw;

class Generator
{
    protected ImagickDraw $imagickDraw;

    protected Imagick $gmagick;

    public function __construct()
    {
        $this->imagickDraw = new ImagickDraw();
        $this->gmagick = new Imagick();
    }

    public function generateImage(): array
    {
        /** Set color lines */
        $this->imagickDraw->setFillColor('red');
        /** Set width and height of the image */
        $this->imagickDraw->setStrokeWidth(1);
        /** Draw lines */
        $this->drawFigure('line', 40, rand(0, 500), rand(0, 500), rand(0, 500), rand(0, 500));

        $this->imagickDraw->setFillColor('green');
        $this->drawFigure('rectangle', 5, rand(0, 500), rand(0, 500), rand(0, 500), rand(0, 500));

        $this->gmagick->newImage(500, 500, 'White');
        $this->gmagick->setImageFormat("png");

        $this->gmagick->drawImage($this->imagickDraw);

        return [
            'base64_image' => base64_encode($this->gmagick->getImageBlob())
        ];
    }

    protected function drawFigure(string $figure, int $times, ?int $maxValueX1 = 100, ?int $maxValueY1 = 60, ?int $maxValueX2 = 500, ?int $maxValueY2 = 500)
    {
        for ($x = 0; $x < $times; $x++) {
            $this->imagickDraw->{$figure}(
                rand($this->getNumberWithRandomPrefix($maxValueX1), $this->getNumberWithRandomPrefix($maxValueX1)),
                rand($this->getNumberWithRandomPrefix($maxValueY1), $this->getNumberWithRandomPrefix($maxValueY1)),
                rand($this->getNumberWithRandomPrefix($maxValueX2), $this->getNumberWithRandomPrefix($maxValueX2)),
                rand($this->getNumberWithRandomPrefix($maxValueY2), $this->getNumberWithRandomPrefix($maxValueY2))
            );
            $this->imagickDraw->{$figure}(
                rand($this->getNumberWithRandomPrefix($maxValueX1), $this->getNumberWithRandomPrefix($maxValueX1)),
                rand($this->getNumberWithRandomPrefix($maxValueY1), $this->getNumberWithRandomPrefix($maxValueY1)),
                rand($this->getNumberWithRandomPrefix($maxValueX2), $this->getNumberWithRandomPrefix($maxValueX2)),
                rand($this->getNumberWithRandomPrefix($maxValueY2), $this->getNumberWithRandomPrefix($maxValueY2))
            );
        }
    }

    protected function getNumberWithRandomPrefix(int $number)
    {
        if (rand(0, 100) > 50) {
            return -$number;
        }

        return $number;
    }
}
