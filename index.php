<?php

include_once('functions/bootstrap.php');

$images = getImages();
$errors = getErrors();
$uploadInfo = getUploadMessages();

include_once('views/templates/main_template.php');
