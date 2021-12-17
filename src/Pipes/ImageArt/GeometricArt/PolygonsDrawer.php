<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Pipes\ImageArt\GeometricArt;

use Closure;
use Cyberwavee\ImageGenerator\Helpers\ColourHelper;
use Cyberwavee\ImageGenerator\Helpers\ImageArtHelper;
use Cyberwavee\ImageGenerator\Interfaces\ShapeDrawerInterface;
use Cyberwavee\ImageGenerator\Support\Traits\CheckImageArtDataAttributes;
use Throwable;

class PolygonsDrawer implements ShapeDrawerInterface
{
    use CheckImageArtDataAttributes;

    /**
     * @param array $data
     * @param Closure $next
     *
     * @return array|null
     * @throws Throwable
     */
    public function handle(array $data, Closure $next): ?array
    {
        $this->checkImageArtDataAttributes($data);

        for ($x = 0; $x < 100; $x++) {
            $data['ImagickDraw']->point(
                rand(ImageArtHelper::getNumberWithRandomPrefix(rand(0, 3000)), ImageArtHelper::getNumberWithRandomPrefix(rand(0, 3000))),
                rand(ImageArtHelper::getNumberWithRandomPrefix(rand(0, 3000)), ImageArtHelper::getNumberWithRandomPrefix(rand(0, 3000)))
            );

            $data['ImagickDraw']->setFillColor(ColourHelper::getRandomShapeColour());
            $data['ImagickDraw']->setStrokeMiterLimit(40 * 12);

            $points = [
                ['x' => ImageArtHelper::getNumberWithRandomPrefix(rand(0, ImageArtHelper::IMAGE_WIDTH)), 'y' => ImageArtHelper::getNumberWithRandomPrefix(rand(0, ImageArtHelper::IMAGE_HEIGHT))],
                ['x' => ImageArtHelper::getNumberWithRandomPrefix(rand(0, ImageArtHelper::IMAGE_WIDTH)), 'y' => ImageArtHelper::getNumberWithRandomPrefix(rand(0, ImageArtHelper::IMAGE_HEIGHT))],
                ['x' => ImageArtHelper::getNumberWithRandomPrefix(rand(0, ImageArtHelper::IMAGE_WIDTH)), 'y' => ImageArtHelper::getNumberWithRandomPrefix(rand(0, ImageArtHelper::IMAGE_HEIGHT))],
                ['x' => ImageArtHelper::getNumberWithRandomPrefix(rand(0, ImageArtHelper::IMAGE_WIDTH)), 'y' => ImageArtHelper::getNumberWithRandomPrefix(rand(0, ImageArtHelper::IMAGE_HEIGHT))],
            ];

            $data['ImagickDraw']->polygon($points);
        }

        return $next($data);
    }
}