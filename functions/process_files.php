<?php

/**
 * Get images from the passed directory
 * @param string $directory
 * @return array
 */
function getImages(string $directory = 'assets/images'): array
{
    $images = [];
    $allowed_extensions = ['jpg', 'jpeg', 'png'];

    if (is_dir($directory)) {
        $files = scandir($directory);

        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

                if (in_array($extension, $allowed_extensions)) {
                    $images[] = [
                        'full' => $directory . '/' . $file,
                        'thumb' => $directory . '/' . $file,
                        'width' => 1200,
                        'height' => 700
                    ];
                }
            }
        }
    }

    return $images;
}
