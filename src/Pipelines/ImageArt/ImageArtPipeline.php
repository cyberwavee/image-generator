<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Pipelines\ImageArt;

use Cyberwavee\ImageGenerator\Interfaces\Pipelines\ImageArt\ImageArtPipelineInterface;
use Closure;
use Throwable;
use Exception;

class ImageArtPipeline implements ImageArtPipelineInterface
{
    /**
     * The object being passed through the pipeline.
     *
     * @var array
     */
    protected array $passable;

    /**
     * The array of class pipes.
     *
     * @var array
     */
    protected array $pipes = [];

    /**
     * The method to call on each pipe.
     *
     * @var string
     */
    protected string $method = 'handle';

    /**
     * Set the object being sent through the pipeline.
     *
     * @param array $passable
     *
     * @return ImageArtPipelineInterface
     */
    public function send(array $passable): ImageArtPipelineInterface
    {
        $this->passable = $passable;

        return $this;
    }

    /**
     * Set the array of pipes.
     *
     * @param $pipes
     *
     * @return ImageArtPipelineInterface
     */
    public function setPipes($pipes): ImageArtPipelineInterface
    {
        $this->pipes = is_array($pipes) ? $pipes : func_get_args();

        return $this;
    }

    /**
     * Get the array of configured pipes.
     *
     * @return array
     */
    protected function getPipes(): array
    {
        return $this->pipes;
    }

    /**
     * Run the pipeline with a final destination callback.
     *
     * @param Closure $destination
     *
     * @return mixed
     */
    public function then(Closure $destination)
    {
        $pipeline = array_reduce(
            array_reverse($this->getPipes()), $this->carry(), $this->prepareDestination($destination)
        );

        return $pipeline($this->passable);
    }

    /**
     * Run the pipeline and return the result.
     *
     * @return mixed
     */
    public function thenReturn()
    {
        return $this->then(function ($passable) {
            return $passable;
        });
    }

    /**
     * Get the final piece of the Closure onion.
     *
     * @param Closure $destination
     * @return Closure
     */
    protected function prepareDestination(Closure $destination): Closure
    {
        return function ($passable) use ($destination) {
            try {
                return $destination($passable);
            } catch (Throwable $e) {
                return $e;
            }
        };
    }

    /**
     * Get a Closure that represents a slice of the application onion.
     *
     * @return Closure
     */
    protected function carry(): Closure
    {
        return function ($stack, $pipe) {
            return function ($passable) use ($stack, $pipe) {
                try {
                    if (!is_object($pipe)) {
                        throw new Exception("You must set array of objects in send() method!");
                    }

                    if (is_callable($pipe)) {
                        // If the pipe is a callable, then we will call it directly, but otherwise we
                        // will resolve the pipes out of the dependency container and call it with
                        // the appropriate method and arguments, returning the results back out.
                        return $pipe($passable, $stack);
                    } else {
                        // If the pipe is already an object we'll just make a callable and pass it to
                        // the pipe as-is. There is no need to do any extra parsing and formatting
                        // since the object we're given was already a fully instantiated object.
                        $parameters = [$passable, $stack];
                    }

                    return method_exists($pipe, $this->method)
                        ? $pipe->{$this->method}(...$parameters)
                        : $pipe(...$parameters);
                } catch (Throwable $e) {
                    return $e;
                }
            };
        };
    }
}