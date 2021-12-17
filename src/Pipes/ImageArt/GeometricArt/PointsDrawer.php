<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Pipes\ImageArt\GeometricArt;

use Closure;
use Cyberwavee\ImageGenerator\Helpers\ColourHelper;
use Cyberwavee\ImageGenerator\Helpers\ImageArtHelper;
use Cyberwavee\ImageGenerator\Interfaces\ShapeDrawerInterface;
use Cyberwavee\ImageGenerator\Support\Traits\CheckImageArtDataAttributes;
use Throwable;

class PointsDrawer implements ShapeDrawerInterface
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

        for ($x = 0; $x < 15000; $x++) {
            $data['ImagickDraw']->setFillColor(ColourHelper::getRandomShapeColour());

            $data['ImagickDraw']->point(
                rand(ImageArtHelper::getNumberWithRandomPrefix(rand(0, 3000)), ImageArtHelper::getNumberWithRandomPrefix(rand(0, 3000))),
                rand(ImageArtHelper::getNumberWithRandomPrefix(rand(0, 3000)), ImageArtHelper::getNumberWithRandomPrefix(rand(0, 3000)))
            );
        }

        return $next($data);
    }
}