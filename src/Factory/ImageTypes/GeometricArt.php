<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Factory\ImageTypes;

use Cyberwavee\ImageGenerator\Helpers\ColourHelper;
use Cyberwavee\ImageGenerator\Interfaces\Factory\ImageTypes\GeometricArtInterface;
use Imagick;
use ImagickDraw;

class GeometricArt implements GeometricArtInterface
{
    protected array $data;

    protected ImagickDraw $imagickDraw;

    protected Imagick $gmagick;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->imagickDraw = new ImagickDraw();
        $this->gmagick = new Imagick();
    }

    /**
     * @return string
     * @throws \ImagickDrawException
     * @throws \ImagickException
     */
    public function createImage(): string
    {
        /** Set color lines */
        $this->imagickDraw->setFillColor(ColourHelper::getRandomShapeColour());
        /** Set width and height of the image */
        $this->imagickDraw->setStrokeWidth(random_int(0, 10));
        /** Draw lines */
        $this->drawFigure('line', 40, rand(0, 500), rand(0, 500), rand(0, 500), rand(0, 500));

        $this->imagickDraw->setFillColor(ColourHelper::getRandomShapeColour());
        $this->drawFigure('rectangle', 5, rand(0, 500), rand(0, 500), rand(0, 500), rand(0, 500));

        $this->gmagick->newImage(500, 500, ColourHelper::PALE_COLOUR);
        $this->gmagick->setImageFormat("png");

        $this->gmagick->drawImage($this->imagickDraw);

        return base64_encode($this->gmagick->getImageBlob());
    }

    /**
     * @param string $figure
     * @param int $times
     * @param int|null $maxValueX1
     * @param int|null $maxValueY1
     * @param int|null $maxValueX2
     * @param int|null $maxValueY2
     * @return void
     */
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

    /**
     * @param int $number
     * @return int
     */
    protected function getNumberWithRandomPrefix(int $number): int
    {
        if (rand(0, 100) > 50) {
            return -$number;
        }

        return $number;
    }
}