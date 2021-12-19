<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Helpers;

class ImageArtHelper
{
    public const IMAGE_HEIGHT = 1080;

    public const IMAGE_WIDTH = 1920;

    public const DEFAULT_SHAPES_NUMBER = 500;

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

    /**
     * @param int $number
     *
     * @return int
     */
    public static function getNumberWithRandomPrefix(int $number): int
    {
        if (mt_rand(0, 100) > 50) {
            return -$number;
        }

        return $number;
    }
}