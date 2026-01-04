<?php

namespace App\Helpers;

class XOImageHelper
{
    public static function resizeCropSquareWebp($file, $folder = 'collection', $size = 1200, $quality = 50)
    {
        $storagePath = storage_path('app/public/' . $folder);
        if (!file_exists($storagePath)) {
            mkdir($storagePath, 0755, true);
        }

        list($width, $height) = getimagesize($file->getPathname());

        // Tentukan sisi terkecil untuk crop square
        $minSide = min($width, $height);
        $srcX = ($width - $minSide) / 2;
        $srcY = ($height - $minSide) / 2;

        $ext = strtolower($file->getClientOriginalExtension());
        if ($ext === 'png') {
            $srcImg = imagecreatefrompng($file->getPathname());
        } else {
            $srcImg = imagecreatefromjpeg($file->getPathname());
        }

        $dstImg = imagecreatetruecolor($size, $size);

        if ($ext === 'png') {
            imagealphablending($dstImg, false);
            imagesavealpha($dstImg, true);
        }

        // Crop dan resize sekaligus
        imagecopyresampled(
            $dstImg,
            $srcImg,
            0,
            0,
            $srcX,
            $srcY,
            $size,
            $size,
            $minSide,
            $minSide
        );

        $filename = time() . '.webp';
        $dstPath = $storagePath . '/' . $filename;
        imagewebp($dstImg, $dstPath, $quality);

        imagedestroy($srcImg);
        imagedestroy($dstImg);

        return $folder . '/' . $filename;
    }

    public static function resizeWebp($file, $folder = 'logo', $maxWidth = 800, $maxHeight = 800, $quality = 80)
    {
        $storagePath = storage_path('app/public/' . $folder);
        if (!file_exists($storagePath)) {
            mkdir($storagePath, 0755, true);
        }

        list($origWidth, $origHeight) = getimagesize($file->getPathname());

        $ext = strtolower($file->getClientOriginalExtension());
        if ($ext === 'png') {
            $srcImg = imagecreatefrompng($file->getPathname());
        } else {
            $srcImg = imagecreatefromjpeg($file->getPathname());
        }

        // Hitung aspect ratio
        $ratio = min($maxWidth / $origWidth, $maxHeight / $origHeight);
        $targetW = (int)($origWidth * $ratio);
        $targetH = (int)($origHeight * $ratio);

        $dstImg = imagecreatetruecolor($targetW, $targetH);

        if ($ext === 'png') {
            imagealphablending($dstImg, false);
            imagesavealpha($dstImg, true);
        }

        imagecopyresampled(
            $dstImg,
            $srcImg,
            0,
            0,
            0,
            0,
            $targetW,
            $targetH,
            $origWidth,
            $origHeight
        );

        $filename = time() . '.webp';
        $dstPath  = $storagePath . '/' . $filename;
        imagewebp($dstImg, $dstPath, $quality);

        imagedestroy($srcImg);
        imagedestroy($dstImg);

        return $folder . '/' . $filename;
    }
}
