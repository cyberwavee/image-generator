<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Interfaces\Pipelines\ImageArt;

use Closure;

interface ImageArtPipelineInterface
{
    /**
     * @param array $passable
     *
     * @return ImageArtPipelineInterface
     */
    public function send(array $passable): ImageArtPipelineInterface;

    /**
     * @param array|mixed $pipes
     *
     * @return ImageArtPipelineInterface
     */
    public function setPipes($pipes): ImageArtPipelineInterface;

    /**
     * @param Closure $destination
     *
     * @return mixed
     */
    public function then(Closure $destination);

    /**
     * @return mixed
     */
    public function thenReturn();
}