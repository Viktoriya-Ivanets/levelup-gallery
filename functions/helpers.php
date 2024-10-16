<?php

/**
 * Format $_FILES
 * @param array $files
 * @return array
 */
function formatFilesArray(array $files): array
{
    return array_map(function ($key) use ($files) {
        return [
            'name' => $files['name'][$key],
            'type' => $files['type'][$key],
            'tmp_name' => $files['tmp_name'][$key],
            'error' => $files['error'][$key],
            'size' => $files['size'][$key]
        ];
    }, array_keys($files['name']));
}

/**
 * Convert a two-dimensional array into a one-dimensional array if needed
 * @param array $errors
 * @return array
 */
function formatErrorsArray(array $errors): array
{
    if (in_array($errors[0], [ERROR_MESSAGES[0], ERROR_MESSAGES[1]])) {
        return $errors;
    }

    $formattedErrors = array_reduce($errors, function ($carry, $fileErrors) {
        return array_merge($carry, $fileErrors);
    }, []);

    return $formattedErrors;
}


/**
 * Sets errors in the session.
 *
 * @param array $errors An array of errors to be recorded.
 */
function setErrors(array $errors): void
{
    session_start();
    $_SESSION['errors'] = $errors;
}

/**
 * Get errors from the session.
 *
 * @return array An array of errors, if any, otherwise an empty array.
 */
function getErrors(): array
{
    session_start();
    if (isset($_SESSION['errors']) && is_array($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']); // Remove errors from the session after receiving
        return $errors;
    }
    return [];
}

/**
 * Set upload success or error message to session
 * @param array $uploadedFiles
 * @return void
 */
function setUploadMessages(array $uploadedFiles): void
{
    session_start();
    if (empty($uploadedFiles)) {
        $_SESSION['upload_info'] = UPLOAD_MESSAGES[0]; //See in config.php
    } else {
        $_SESSION['upload_info'] = count($uploadedFiles) . UPLOAD_MESSAGES[1]; //See in config.php
    }
}

/**
 * Get upload message
 * @return array|null
 */
function getUploadMessages(): string|null
{
    session_start();
    if (isset($_SESSION['upload_info'])) {
        $info = $_SESSION['upload_info'];
        unset($_SESSION['upload_info']);
        return $info;
    }
    return null;
}

/**
 * Redirect to the location
 * @return never
 */
function redirect(string $location = '..' . DIRECTORY_SEPARATOR . 'index.php'): never
{
    header("Location: " . $location);
    exit();
}

/**
 * Get extension of the file
 * @param string $file
 * @return string
 */
function getExtension(string $file): string
{
    return strtolower(pathinfo($file, PATHINFO_EXTENSION));
}
