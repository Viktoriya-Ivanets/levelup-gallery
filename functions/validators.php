<?php

/**
 * Collect all possible errors due to uploaded files
 * @param array $files
 * @return array
 */
function validateImages(array $files): array
{
    $errors = [];

    if (isNoFileError($files)) {
        return [ERROR_MESSAGES[0]]; // See in config.php
    }

    if (isFileLimitExceeded($files)) {
        return [ERROR_MESSAGES[1]]; // See in config.php
    }

    foreach ($files as $file) {
        $errors[$file['name']] = validateFile($file);
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

    if ($extensionError = checkExtension($file['name'], ALLOWED_EXTENSIONS)) {
        $errors[] = $extensionError;
    }

    if ($sizeError = checkSize($file, MAX_FILE_SIZE)) {
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
        return $file . ERROR_MESSAGES[2]; // See in config.php
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
        return $file . ERROR_MESSAGES[3]; // See in config.php
    }
    return null;
}
