<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Support\Traits;

use Throwable;
use Exception;
use ImagickDraw;

trait CheckImageArtDataAttributes
{
    /**
     * @param array $data
     *
     * @return void
     * @throws Throwable
     */
    protected function checkImageArtDataAttributes(array $data): void
    {
        throw_if(
            !isset($data['ImagickDraw']),
            Exception::class,
            'Set ImagickDraw parameter!'
        );

        throw_if(
            !($data['ImagickDraw'] instanceof ImagickDraw),
            Exception::class,
            'ImagickDraw parameter not instance of ImagickDraw'
        );
    }
}