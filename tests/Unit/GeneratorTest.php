<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Tests\Unit;

use Cyberwavee\ImageGenerator\Generator;
use Cyberwavee\ImageGenerator\Helpers\ImageArtHelper;
use PHPUnit\Framework\TestCase;
use Throwable;
use Exception;

class GeneratorTest extends TestCase
{
    /**
     * @return void
     * @throws Throwable
     */
    public function testGenerateImageWithValidImageArtType()
    {
        $config = [
            'image_art_type' => ImageArtHelper::getRandomImageArt()
        ];
        $imageGenerator = new Generator($config);
        $generatedImage = $imageGenerator->generateImage();

        $this->assertTrue(isset($generatedImage['base64_image']));
        $this->assertIsString($generatedImage['base64_image']);
        $this->assertTrue(base64_encode(base64_decode($generatedImage['base64_image'], true)) === $generatedImage['base64_image']);
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testGenerateImageWithInvalidImageArtType()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Wrong image art type! Please, correct your config.');

        $config = [
            'image_art_type' => 'non-existent type'
        ];
        $imageGenerator = new Generator($config);
        $imageGenerator->generateImage();
    }
}