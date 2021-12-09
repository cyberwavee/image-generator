<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Interfaces\Factory;

interface ImageRenderInterface
{
    /**
     * @return string
     */
    public function createImage(): string;
}