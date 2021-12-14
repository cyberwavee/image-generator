<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Pipes\ImageArt\GeometricArt;

use Cyberwavee\ImageGenerator\Helpers\ColourHelper;
use Cyberwavee\ImageGenerator\Interfaces\ShapeInterface;
use Cyberwavee\ImageGenerator\Support\Traits\CheckImageArtDataAttributes;
use Throwable;
use Closure;

class LinesDrawer implements ShapeInterface
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

        /** Set width and height of the image */
        $data['ImagickDraw']->setStrokeWidth(random_int(0, 60));

        /** Draw lines */
        for ($x = 0; $x < 46; $x++) {
            $data['ImagickDraw']->line(
                rand($this->getNumberWithRandomPrefix(rand(0, 1500)), $this->getNumberWithRandomPrefix(rand(0, 1500))),
                rand($this->getNumberWithRandomPrefix(rand(0, 1500)), $this->getNumberWithRandomPrefix(rand(0, 1500))),
                rand($this->getNumberWithRandomPrefix(rand(0, 1500)), $this->getNumberWithRandomPrefix(rand(0, 1500))),
                rand($this->getNumberWithRandomPrefix(rand(0, 1500)), $this->getNumberWithRandomPrefix(rand(0, 1500)))
            );
        }

        return $next($data);
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