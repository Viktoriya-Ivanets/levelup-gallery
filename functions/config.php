<?php
const DEFAULT_DIR = 'uploads/images';
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
    1 => 'Images uploaded successfully!'
];
