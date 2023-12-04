<?php

/*
 * ATTENTION: Set images directory as custom working directory before running this script!
 */

$img_dir = getcwd();
$quality = defined('IMG_OPT_QUALITY') ? constant('IMG_OPT_QUALITY') : 90;
$excl_re = defined('IMG_OPT_EXCLUDE_RE') ? constant('IMG_OPT_EXCLUDE_RE') : '/^ico-/';

/**
 * @throws Exception if gd module is not enabled.
 */
function convertToWebp($src, $quality = 100, $remove_src = false): string|null
{
    if (!extension_loaded('gd'))
        throw new Exception('Please enable gd first!');

    if (pathinfo($src, PATHINFO_EXTENSION) === 'svg')
        return null;

    echo PHP_EOL . 'Optimizing ' . $src;

    $dir = pathinfo($src, PATHINFO_DIRNAME);
    $name = pathinfo($src, PATHINFO_FILENAME);
    $destination = $dir . DIRECTORY_SEPARATOR . $name . '.webp';
    $info = getimagesize($src);
    $has_alpha = false;

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($src);
    elseif ($has_alpha = $info['mime'] == 'image/gif')
        $image = imagecreatefromgif($src);
    elseif ($has_alpha = $info['mime'] == 'image/png')
        $image = imagecreatefrompng($src);
    else
        return $src;

    if ($has_alpha) { // gd does not create alpha channel by default!
        imagepalettetotruecolor($image);
        imagealphablending($image, true);
        imagesavealpha($image, true);
    }

    imagewebp($image, $destination, $quality);

    $file_size = filesize($src);
    $new_file_size = filesize($destination);

    echo ' (' . $file_size;
    echo ' => ' . $new_file_size . ')';
    echo ' (' . round(100 - ($new_file_size / $file_size) * 100, 2) . '% smaller)';

    if ($remove_src)
        unlink($src);

    return $destination;
}

$it = new RecursiveDirectoryIterator($img_dir);
foreach (new RecursiveIteratorIterator($it) as $file) {
    if ($file->getExtension() === 'webp' || is_dir($file))
        continue;

    if (preg_match($excl_re, pathinfo($file, PATHINFO_FILENAME)))
        continue;

    /** @noinspection PhpUnhandledExceptionInspection */
    convertToWebp($file, quality: $quality);
}