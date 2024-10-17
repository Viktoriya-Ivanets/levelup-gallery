<?php

const SITE_NAME = 'Photo Gallery';
const DEFAULT_DIR = 'uploads' . DIRECTORY_SEPARATOR . 'images';
const VIEWS_COMMON_DIR = 'views' . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR;
const VIEWS_LAYOUT_DIR = 'views' . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR;
const VIEWS_TEMPLATES_DIR = 'views' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR;
const PHOTOSWIPE_DIR = 'lib' . DIRECTORY_SEPARATOR . 'photoswipe' . DIRECTORY_SEPARATOR;
const CSS_DIR = 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR;
const JS_DIR = 'assets' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR;
const MAX_FILES_ALLOWED = 10;
const ALLOWED_EXTENSIONS = ['jpg', 'jpeg', 'png'];
const MAX_FILE_SIZE = 5 * 1024 * 1024; // 5 MB
const ERROR_MESSAGES = [
    0 => 'Please choose at least one file for upload',
    1 => 'No more than 10 files allowed to upload',
    2 => ' has incorrect format. Allowed formats: jpg, jpeg, png.',
    3 => ' more than max file size - 5 Mb.'
];
const UPLOAD_MESSAGES = [
    0 => 'Failed to upload images.',
    1 => ' images uploaded successfully!'
];
