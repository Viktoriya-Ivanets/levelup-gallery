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

    processUploadResult($errors, $formattedFiles);
}

/**
 * Save files to the directory or set errors
 * @param array $errors
 * @param array $formattedFiles
 * @return void
 */
function processUploadResult(array $errors, array $formattedFiles): void
{
    if (empty($errors)) {
        uploadImages($formattedFiles);
    } else {
        setErrors($errors);
    }

    redirect(); // To index.php
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    handleUpload();
}
