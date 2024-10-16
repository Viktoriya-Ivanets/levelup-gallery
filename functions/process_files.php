<?php

/**
 * Get images from the passed directory
 * @param string $directory
 * @return array
 */
function getImages(string $directory = 'assets/images'): array
{
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $files = getFilesFromDirectory($directory);

    return filterImages($files, $allowedExtensions, $directory);
}

/**
 * Get files from directory
 * @param string $directory
 * @return array
 */
function getFilesFromDirectory(string $directory): array
{
    return is_dir($directory) ? scandir($directory) : [];
}

/**
 * Filter and format image files
 * @param array $files
 * @param array $allowedExtensions
 * @param string $directory
 * @return array
 */
function filterImages(array $files, array $allowedExtensions, string $directory): array
{
    $images = [];

    foreach ($files as $file) {
        if (!checkExtension($file, $allowedExtensions)) {
            $images[] = formatImageData($file, $directory);
        }
    }

    return $images;
}

/**
 * Format image data
 * @param string $file
 * @param string $directory
 * @return array
 */
function formatImageData(string $file, string $directory): array
{
    return [
        'full' => $directory . '/' . $file,
        'thumb' => $directory . '/' . $file,
        'width' => 1200,
        'height' => 700
    ];
}

/**
 * Save uploaded images in directory
 * @param array $files
 * @param string $directory
 * @return void
 */
function uploadImages(array $files, string $directory = '../assets/images'): void
{
    if (!is_dir($directory)) {
        mkdir($directory, 0755, true);
    }

    $uploadedFiles = processFileUploads($files, $directory);

    setUploadMessages($uploadedFiles);
}

/**
 * Process file uploads
 * @param array $files
 * @param string $directory
 * @return array
 */
function processFileUploads(array $files, string $directory): array
{
    $uploadedFiles = [];

    foreach ($files as $file) {
        $uniqueName = generateUniqueFileName($file['name']);
        $targetFile = $directory . '/' . $uniqueName;

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            $uploadedFiles[] = $targetFile;
        }
    }

    return $uploadedFiles;
}

/**
 * Generate unique file name
 * @param string $fileName
 * @return string
 */
function generateUniqueFileName(string $fileName): string
{
    return uniqid('img_', true) . '.' . getExtension($fileName);
}
