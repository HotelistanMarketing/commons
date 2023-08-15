<?php

/*
 * ATTENTION: Set images directory as custom working directory before running this script!
 */

$img_dir = getcwd();
$formats = defined('IMG_OPT_FORMATS') ? constant('IMG_OPT_FORMATS') : ['png', 'jpeg', 'jpg'];
$quality = defined('IMG_OPT_QUALITY') ? constant('IMG_OPT_QUALITY') : 100;
$excl_re = defined('IMG_OPT_EXCLUDE_RE') ? constant('IMG_OPT_EXCLUDE_RE') : '/^ico-/';

/**
 * @throws Exception if gd module is not enabled.
 */
function convertToWebp($source, $quality = 100, $removeOld = false)
{
    if (!extension_loaded('gd'))
        throw new Exception('Please enable gd first!');

    $dir = pathinfo($source, PATHINFO_DIRNAME);
    $name = pathinfo($source, PATHINFO_FILENAME);
    $destination = $dir . DIRECTORY_SEPARATOR . $name . '.webp';
    $info = getimagesize($source);
    $isAlpha = false;

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);
    elseif ($isAlpha = $info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);
    elseif ($isAlpha = $info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);
    else
        return $source;

    if ($isAlpha) { // gd does not create alpha channel by default!
        imagepalettetotruecolor($image);
        imagealphablending($image, true);
        imagesavealpha($image, true);
    }

    imagewebp($image, $destination, $quality);

    if ($removeOld)
        unlink($source);

    return $destination;
}

$it = new RecursiveDirectoryIterator($img_dir);
foreach (new RecursiveIteratorIterator($it) as $file) {
    if (!in_array($file->getExtension(), $formats))
        continue;

    if (preg_match($excl_re, pathinfo($file, PATHINFO_FILENAME)))
        continue;

    echo PHP_EOL . 'Optimizing ' . $file . '...';

    /** @noinspection PhpUnhandledExceptionInspection */
    convertToWebp($file, quality: $quality);
}