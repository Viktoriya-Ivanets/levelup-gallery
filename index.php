<?php

include_once('functions/config.php');

$images = getImages();
$errors = getErrors();

include_once('templates/main_template.php');
