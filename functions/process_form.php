<?php

include_once('bootstrap.php');

/**
 * Get and validate uploaded files
 * @return void
 */
function handleUpload(): void
{
    $formattedFiles = formatFilesArray($_FILES['file']);
    $errors = validateImages($formattedFiles);
    error_log(print_r($errors, true));
    $validFiles = [];

    foreach ($formattedFiles as $file) {
        if (empty($errors[$file['name']])) {
            $validFiles[] = $file;
        }
    }

    processUploadResult($validFiles, $errors);
}

/**
 * Save files to the directory or set errors
 * @param array $validFiles
 * @param array $invalidFiles
 * @return void
 */
function processUploadResult(array $validFiles, array $errors): void
{
    if ($errors[0] != ERROR_MESSAGES[0] && $errors[0] != ERROR_MESSAGES[1] && !empty($validFiles)) {
        uploadImages($validFiles);
    }
    if (!empty($errors)) {
        setErrors(formatErrorsArray($errors));
    }

    redirect(); // To index.php
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    handleUpload();
}
