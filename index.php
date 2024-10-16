<?php

include_once('functions/config.php');

$images = getImages();
$errors = getErrors();
$uploadInfo = getUploadMessages();

include_once('templates/main_template.php');
