<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Pipes\ImageArt\GeometricArt;

use Cyberwavee\ImageGenerator\Helpers\ColourHelper;
use Cyberwavee\ImageGenerator\Helpers\ImageArtHelper;
use Cyberwavee\ImageGenerator\Interfaces\ShapeDrawerInterface;
use Cyberwavee\ImageGenerator\Support\Traits\CheckImageArtDataAttributes;
use Throwable;
use Closure;

class LinesDrawer implements ShapeDrawerInterface
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

        /** Set color lines */
        $data['ImagickDraw']->setFillColor(ColourHelper::getRandomShapeColour());

        /** Draw lines */
        for ($x = 0; $x < 46; $x++) {
            /** Set width of the image */
            $data['ImagickDraw']->setStrokeWidth(random_int(0, 800));

            $data['ImagickDraw']->line(
                rand(ImageArtHelper::getNumberWithRandomPrefix(rand(0, 3000)), ImageArtHelper::getNumberWithRandomPrefix(rand(0, 3000))),
                rand(ImageArtHelper::getNumberWithRandomPrefix(rand(0, 3000)), ImageArtHelper::getNumberWithRandomPrefix(rand(0, 3000))),
                rand(ImageArtHelper::getNumberWithRandomPrefix(rand(0, 3000)), ImageArtHelper::getNumberWithRandomPrefix(rand(0, 3000))),
                rand(ImageArtHelper::getNumberWithRandomPrefix(rand(0, 3000)), ImageArtHelper::getNumberWithRandomPrefix(rand(0, 3000)))
            );
        }

        return $next($data);
    }
}