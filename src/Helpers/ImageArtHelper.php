<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Helpers;

class ImageArtHelper
{
    public const RANDOM_ART_TYPE = 'random_art';

    public const GEOMETRIC_ART_TYPE = 'geometric_art';

    /**
     * @var array
     */
    public static array $imageArtTypes = [
        self::GEOMETRIC_ART_TYPE,
    ];

    /**
     * @return string
     */
    public static function getRandomImageArt(): string
    {
        shuffle(self::$imageArtTypes);
        return self::$imageArtTypes[array_rand(self::$imageArtTypes)];
    }
}