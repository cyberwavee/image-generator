<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator;

use Cyberwavee\ImageGenerator\Factory\ImageGenerators\GeometricArtGenerator;

class Generator
{
    /**
     * @return array
     */
    public function generateImage(): array
    {
        $imageGenerator = new GeometricArtGenerator(['gg' => 'gg123123wp11']);
        $base64Image = $imageGenerator->render();

        return [
            'base64_image' => $base64Image
        ];
    }
}
