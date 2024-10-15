<?php

include_once('config.php');

/**
 * Validate uploaded files. Set errors if exists, else - save photo to directory
 * @return void
 */
function handleUpload(): void
{
    $formatedFiles = formatFilesArray($_FILES['file']);
    $errors = validateImages($formatedFiles);

    if (empty($errors)) {
        uploadImages($formatedFiles);
        redirect('../index.php');
    } else {
        setErrors($errors);
        redirect('../index.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    handleUpload();
}
