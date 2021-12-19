<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Pipes\ImageArt\GeometricArt;

use Cyberwavee\ImageGenerator\Helpers\ColourHelper;
use Cyberwavee\ImageGenerator\Helpers\ImageArtHelper;
use Cyberwavee\ImageGenerator\Interfaces\ShapeDrawerInterface;
use Cyberwavee\ImageGenerator\Support\Traits\CheckImageArtDataAttributes;
use Throwable;
use Closure;

class SquaresDrawer implements ShapeDrawerInterface
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
        $squareShapesTimes = mt_rand(5, 50);

        $data['ImagickDraw']->setFillColor(ColourHelper::getRandomShapeColour());

        for ($x = 0; $x < $squareShapesTimes; $x++) {
            $leftX = mt_rand(0, ImageArtHelper::IMAGE_WIDTH);
            $leftY = mt_rand(0, ImageArtHelper::IMAGE_HEIGHT);

            $data['ImagickDraw']->rectangle(
                $leftX,
                $leftY,
                $leftX + mt_rand(0, 80),
                $leftY + mt_rand(0, 65)
            );
        }

        return $next($data);
    }
}