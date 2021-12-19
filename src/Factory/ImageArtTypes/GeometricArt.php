<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Factory\ImageArtTypes;

use Cyberwavee\ImageGenerator\Helpers\ColourHelper;
use Cyberwavee\ImageGenerator\Helpers\ImageArtHelper;
use Cyberwavee\ImageGenerator\Interfaces\Factory\ImageTypes\GeometricArtInterface;
use Cyberwavee\ImageGenerator\Pipelines\ImageArt\ImageArtPipeline;
use Cyberwavee\ImageGenerator\Pipes\ImageArt\GeometricArt\LinesDrawer;
use Cyberwavee\ImageGenerator\Pipes\ImageArt\GeometricArt\PointsDrawer;
use Cyberwavee\ImageGenerator\Pipes\ImageArt\GeometricArt\PolygonsDrawer;
use Cyberwavee\ImageGenerator\Pipes\ImageArt\GeometricArt\SquaresDrawer;
use ImagickException;
use Imagick;
use ImagickDraw;

class GeometricArt implements GeometricArtInterface
{
    protected array $data;

    protected ImagickDraw $imagickDraw;

    protected Imagick $gmagick;

    protected array $pipes = [
        PolygonsDrawer::class,
        PointsDrawer::class,
        LinesDrawer::class,
        SquaresDrawer::class,
    ];

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->imagickDraw = new ImagickDraw();
        $this->gmagick = new Imagick();
    }

    /**
     * @return string
     *
     * @throws ImagickException
     */
    public function createImage(): string
    {
        $pipeline = new ImageArtPipeline();
        $pipeline->send([
            'ImagickDraw' => $this->imagickDraw,
        ])->setPipes($this->prepareShapePipes($this->pipes))
            ->thenReturn();

        $this->gmagick->newImage(ImageArtHelper::IMAGE_WIDTH, ImageArtHelper::IMAGE_HEIGHT, ColourHelper::PALE_COLOUR);
        $this->gmagick->setImageFormat("png");
        $this->gmagick->drawImage($this->imagickDraw);

        return base64_encode($this->gmagick->getImageBlob());
    }

    /**
     * @param array $shapePipes
     *
     * @return array
     */
    protected function prepareShapePipes(array $shapePipes): array
    {
        foreach ($shapePipes as $shapePipe) {
            for ($x = 1; $x <= mt_rand(1, 2); $x++) {
                $shapePipes[] = $shapePipe;
            }
        }
        shuffle($shapePipes);

        return $shapePipes;
    }
}