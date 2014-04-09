<?php

namespace ImageInspector;

class Application
{

    public static function render($argv)
    {
        $images_info = array();

        foreach ($argv as $file) {

            $image = new \Imagick();
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
    }

    public static function openBrowser($html, array $images)
    {
        $tmpdir = tempnam(sys_get_temp_dir(), 'imageinspector_');
        $tmpdir_image = $tmpdir . '/images';

        unlink($tmpdir);
        mkdir($tmpdir);
        mkdir($tmpdir_image);

        file_put_contents($tmpdir . '/index.html', $html);
        foreach ($images as $image) {
            copy($image, $tmpdir_image . '/' . basename($image));
        }
        exec("open $tmpdir/index.html");
    }

}

