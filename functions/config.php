<?php
const MAX_FILES_ALLOWED = 10;
const ALLOWED_EXTENSIONS = ['jpg', 'jpeg', 'png'];
const MAX_FILE_SIZE = 5 * 1024 * 1024; // 5 MB

include_once('helpers.php');
include_once('validators.php');
include_once('process_files.php');
include_once('process_form.php');
