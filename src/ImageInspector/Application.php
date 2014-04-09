<?php

$files = array_slice($argv, 1);

$images_info = array();

foreach ($files as $file) {

    $image = new Imagick();
    $image->readImage($file);

    $image->setFirstIterator();


    $images_info[] = array(
        'filename' => basename($file),
        'width' => $image->getImageWidth(),
        'height' => $image->getImageHeight(),
        'size' => $image->getImageLength(),
        'format' => $image->getImageFormat(),
    );

}

include __DIR__ . '/index.php';
