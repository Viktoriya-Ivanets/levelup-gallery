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
                if (in_array(getExtension($file), $allowed_extensions)) {
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

/**
 * Save uploaded images in directory
 * @param array $files
 * @param string $directory
 * @return string[]
 */
function uploadImages(array $files, string $directory = '../assets/images'): array
{
    $uploadedFiles = [];
    if (!is_dir($directory)) {
        mkdir($directory, 0755, true);
    }

    foreach ($files as $file) {
        $uniqueName = uniqid('img_', true) . '.' . getExtension($file['name']);
        $targetFile = $directory . '/' . $uniqueName;

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            $uploadedFiles[] = $targetFile;
        }
    }

    return $uploadedFiles;
}
