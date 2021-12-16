<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Factory\ImageArtTypes;

use Cyberwavee\ImageGenerator\Helpers\ColourHelper;
use Cyberwavee\ImageGenerator\Interfaces\Factory\ImageTypes\GeometricArtInterface;
use Cyberwavee\ImageGenerator\Pipelines\ImageArt\ImageArtPipeline;
use Cyberwavee\ImageGenerator\Pipes\ImageArt\GeometricArt\LinesDrawer;
use Cyberwavee\ImageGenerator\Pipes\ImageArt\GeometricArt\SquaresDrawer;
use ImagickException;
use Imagick;
use ImagickDraw;

class GeometricArt implements GeometricArtInterface
{
    protected array $data;

    protected ImagickDraw $imagickDraw;

    protected Imagick $gmagick;

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
        ])->setPipes([
            new LinesDrawer(),
            new SquaresDrawer(),
        ])->thenReturn();

        $this->gmagick->newImage(2760, 1280, ColourHelper::PALE_COLOUR);
        $this->gmagick->setImageFormat("png");
        $this->gmagick->drawImage($this->imagickDraw);

        return base64_encode($this->gmagick->getImageBlob());
    }
}