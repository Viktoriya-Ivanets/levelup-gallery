<?php

/**
 * Get images from the passed directory
 * @param string $directory
 * @return array
 */
function getImages(string $directory = DEFAULT_DIR): array
{
    return filterImages(getFilesFromDirectory($directory), ALLOWED_EXTENSIONS, $directory);
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
    return array_reduce($files, function ($images, $file) use ($allowedExtensions, $directory) {
        if (!checkExtension($file, $allowedExtensions)) {
            $images[] = formatImageData($file, $directory);
        }
        return $images;
    }, []);
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
        'img' => $directory . DIRECTORY_SEPARATOR . $file,
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
function uploadImages(array $files, string $directory = '..' . DIRECTORY_SEPARATOR . DEFAULT_DIR): void
{
    if (!is_dir($directory)) {
        mkdir($directory, 0755, true);
    }

    setUploadMessages(processFileUploads($files, $directory));
}

/**
 * Process file uploads
 * @param array $files
 * @param string $directory
 * @return array
 */
function processFileUploads(array $files, string $directory): array
{
    return array_filter($files, function ($file) use ($directory) {
        $uniqueName = generateUniqueFileName($file['name']);
        $targetFile = $directory . DIRECTORY_SEPARATOR . $uniqueName;

        return move_uploaded_file($file['tmp_name'], $targetFile) ? $targetFile : false;
    });
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
