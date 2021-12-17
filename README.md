<p align="center"><img src="dist/images/template-images/generated_image_61bceed4cfc2a1639771860.png" width="800"></p>

# <center>Php Image Generator</center>
Another service for generate images (randomizer).

## <center>Requirements</center>
* PHP >= 7.4
* Imagick

## <center>Usage</center>
```php
$config = [
    "image_art_type" => ""
];

$generator = new \Cyberwavee\ImageGenerator\Generator($config);
$generatedImage = $generator->generateImage();
```

## <center>Parameters in config</center>
* **image_art_type**

  Type of art
  + **random_art**
  + **geometric_art**

## <center>Output result of generateImage() method</center>
```php
$generatedImage = [
    "base64_image" => ...base64 image... // string
];
```
