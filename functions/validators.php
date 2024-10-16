<?php

/**
 * Collect all possible errors due to uploaded files
 * @param mixed $files
 * @return string|string[]
 */
function validateImages($files): array
{
    $errors = [];

    if (isNoFileError($files)) {
        return ['Please choose at least one file for upload'];
    }

    if (isFileLimitExceeded($files)) {
        return ['No more than 10 files allowed to upload'];
    }

    foreach ($files as $file) {
        $errors = array_merge($errors, validateFile($file));
    }

    return $errors;
}

/**
 * Check if at least one file was uploaded
 * @param array $files
 * @return bool
 */
function isNoFileError(array $files): bool
{
    return $files[0]['error'] === UPLOAD_ERR_NO_FILE;
}

/**
 * Control number of uploaded files
 * @param array $files
 * @return bool
 */
function isFileLimitExceeded(array $files): bool
{
    return count($files) > MAX_FILES_ALLOWED;
}

/**
 * Validate uploaded file
 * @param array $file
 * @return array
 */
function validateFile(array $file): array
{
    $errors = [];

    $extensionError = checkExtension($file['name'], ALLOWED_EXTENSIONS);
    if ($extensionError) {
        $errors[] = $extensionError;
    }

    $sizeError = checkSize($file, MAX_FILE_SIZE);
    if ($sizeError) {
        $errors[] = $sizeError;
    }

    return $errors;
}

/**
 * Check if file has allowed extension
 * @param string $name
 * @param array $allowed_extensions
 * @return string|null
 */
function checkExtension(string $file, array $allowed_extensions): string|null
{
    if (!in_array(getExtension($file), $allowed_extensions)) {
        return "File " . $file . " has incorrect format. Allowed formats: jpg, jpeg, png.";
    }
    return null;
}
/**
 * Check size of the file
 * @param array $file
 * @param string $maxFileSize
 * @return string|null
 */
function checkSize(array $file, int $maxFileSize): string|null
{
    if ($file['size'] > $maxFileSize) {
        return "File " . $file['name'] . "more than max file size - 5 Mb.";
    }
    return null;
}
