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
                'size' => self::getSize($image),
                'format' => $image->getImageFormat(),
                'colorspace' => self::getColorSpaceString($image),
                'frame' => $image->getNumberImages()
            );

            $image->clear();

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

    private static function getSize(\Imagick $image)
    {
        $size = $image->getImageLength();

        if ($size > 1024 * 1024) {
            return ceil($size * 10 / 1024 / 1024) / 10 . ' MB';
        }

        if ($size > 1024) {
            return ceil($size * 10 / 1024) / 10 . ' KB';
        }

        return $size . 'B';
    }

    private static function getColorSpaceString(\Imagick $image)
    {
        $colorspace = $image->getImageColorSpace();
        switch ($colorspace) {
            case \imagick::COLORSPACE_UNDEFINED:
                return 'UNDEFINED';
                break;
            case \imagick::COLORSPACE_RGB:
                return 'RGB';
                break;
            case \imagick::COLORSPACE_GRAY:
                return 'GRAY';
                break;
            case \imagick::COLORSPACE_TRANSPARENT:
                return 'TRANSPARENT';
                break;
            case \imagick::COLORSPACE_OHTA:
                return 'OHTA';
                break;
            case \imagick::COLORSPACE_LAB:
                return 'LAB';
                break;
            case \imagick::COLORSPACE_XYZ:
                return 'XYZ';
                break;
            case \imagick::COLORSPACE_YCBCR:
                return 'YBCR';
                break;
            case \imagick::COLORSPACE_YCC:
                return 'YCC';
                break;
            case \imagick::COLORSPACE_YIQ:
                return 'YIQ';
                break;
            case \imagick::COLORSPACE_YPBPR:
                return 'YPBPR';
                break;
            case \imagick::COLORSPACE_YUV:
                return 'YUV';
                break;
            case \imagick::COLORSPACE_CMYK:
                return 'CMYK';
                break;
            case \imagick::COLORSPACE_SRGB:
                return 'SRGB';
                break;
            case \imagick::COLORSPACE_HSB:
                return 'HSB';
                break;
            case \imagick::COLORSPACE_HSL:
                return 'HSL';
                break;
            case \imagick::COLORSPACE_HWB:
                return 'HWB';
                break;
            case \imagick::COLORSPACE_REC601LUMA:
                return 'REC601LUMA';
                break;
            case \imagick::COLORSPACE_REC709LUMA:
                return 'REC709LUMA';
                break;
            case \imagick::COLORSPACE_LOG:
                return 'LOG';
                break;
            case \imagick::COLORSPACE_CMY:
                return 'CMY';
                break;
        }
    }

}

