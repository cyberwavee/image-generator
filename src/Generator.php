<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator;

use Cyberwavee\ImageGenerator\Factory\ArtCreator;
use Cyberwavee\ImageGenerator\Factory\ImageArtGenerators\GeometricArtGenerator;
use Cyberwavee\ImageGenerator\Helpers\ImageArtHelper;
use Throwable;
use Exception;

class Generator
{
    /**
     * @var string
     */
    private string $imageArtType;

    /**
     * @return string
     */
    public function getImageArtType(): string
    {
        return $this->imageArtType;
    }

    /**
     * @param string $imageArtType
     */
    public function setImageArtType(string $imageArtType): void
    {
        if ($imageArtType === ImageArtHelper::RANDOM_ART_TYPE) {
            $imageArtType = ImageArtHelper::getRandomImageArt();
        }

        $this->imageArtType = $imageArtType;
    }

    /**
     * @param array $config
     * @throws Throwable
     */
    public function __construct(array $config)
    {
        $this->setConfig($config);
    }

    /**
     * @param array $config
     * @return void
     * @throws Throwable
     */
    private function setConfig(array $config)
    {
        throw_if(
            !in_array($config['image_art_type'], array_merge(ImageArtHelper::$imageArtTypes, [ImageArtHelper::RANDOM_ART_TYPE])),
            Exception::class,
            'Wrong image art type! Please, correct your config.'
        );

        $this->setImageArtType($config['image_art_type']);
    }

    /**
     * @return array
     * @throws Exception
     */
    public function generateImage(): array
    {
        /** @var ArtCreator $imageGeneratorClass */
        switch ($this->getImageArtType()) {
            case ImageArtHelper::GEOMETRIC_ART_TYPE:
                $imageGeneratorClass = GeometricArtGenerator::class;
                break;
            default:
                throw new Exception('Wrong image art type! Please, correct your config.');
        }

        $imageGenerator = new $imageGeneratorClass(['gg' => 'gg123123wp11']);
        $base64Image = $imageGenerator->render();

        return [
            'base64_image' => $base64Image
        ];
    }
}
