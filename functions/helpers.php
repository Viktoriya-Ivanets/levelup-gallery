<?php

/**
 * Format $_FILES
 * @param mixed $files
 * @return array
 */
function formatFilesArray($files): array
{
    $formattedFiles = [];

    foreach ($files['name'] as $key => $name) {
        $formattedFiles[] = [
            'name' => $name,
            'type' => $files['type'][$key],
            'tmp_name' => $files['tmp_name'][$key],
            'error' => $files['error'][$key],
            'size' => $files['size'][$key]
        ];
    }

    return $formattedFiles;
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
 * Redirect to the location
 * @return never
 */
function redirect(string $location): never
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
