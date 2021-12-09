<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Helpers;

class ColourHelper
{
    /** @var string */
    public const ROSE_RED_COLOUR = '#923749';

    /** @var string */
    public const PASTEL_PINK_COLOUR = '#ffd1dc';

    /** @var string */
    public const GREEN_CYAN_COLOUR = '#3b9c83';

    /** @var string */
    public const GRAY_BLUE_COLOUR = '#56619b';

    /** @var string */
    public const PALE_COLOUR = '#f5f6fa';

    /** @var string */
    public const GHOST_WHITE_COLOUR = '#f8f8ff';

    /** @var string */
    public const BLUE_SHADE_OF_BLACK_COLOUR = '#020233';

    /** @var string */
    public const TWILIGHT_LILAC_PINK_COLOUR = '#020233';

    /** @var array */
    public static array $colours = [
        self::ROSE_RED_COLOUR,
        self::PASTEL_PINK_COLOUR,
        self::GREEN_CYAN_COLOUR,
        self::GRAY_BLUE_COLOUR,
        self::PALE_COLOUR,
        self::GHOST_WHITE_COLOUR,
        self::BLUE_SHADE_OF_BLACK_COLOUR,
        self::TWILIGHT_LILAC_PINK_COLOUR,
    ];

    /** @var array */
    public static array $shape_colours = [
        self::ROSE_RED_COLOUR,
        self::PASTEL_PINK_COLOUR,
        self::GREEN_CYAN_COLOUR,
        self::GRAY_BLUE_COLOUR,
        self::BLUE_SHADE_OF_BLACK_COLOUR,
        self::TWILIGHT_LILAC_PINK_COLOUR,
    ];

    /**
     * @return string
     */
    public static function getRandomShapeColour(): string
    {
        shuffle(self::$shape_colours);
        return self::$shape_colours[array_rand(self::$shape_colours)];
    }
}