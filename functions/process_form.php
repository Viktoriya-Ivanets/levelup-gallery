<?php

include_once('bootstrap.php');

/**
 * Get and validate uploaded files
 * @return void
 */
function handleUpload(): void
{
    $files = formatFilesArray($_FILES['file']);
    $errors = validateImages($files);

    $validFiles = array_filter($files, function ($file) use ($errors) {
        return empty($errors[$file['name']]);
    });

    processUploadResult($validFiles, $errors);
}

/**
 * Save files to the directory or set errors
 * @param array $validFiles
 * @param array $errors
 * @return void
 */
function processUploadResult(array $validFiles, array $errors): void
{
    if (!empty($validFiles) && !in_array($errors[0], [ERROR_MESSAGES[0], ERROR_MESSAGES[1]], true)) {
        uploadImages($validFiles);
    }

    if (!empty($errors)) {
        setErrors(formatErrorsArray($errors));
    }

    redirect(); // To index.php
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    handleUpload();
}
