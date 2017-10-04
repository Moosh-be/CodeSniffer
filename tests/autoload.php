<?php

/**
 * Due to a missing definition of autoloader into phpcs composer package
 * We have to do it manually for tests
 */

// rely on composer firstly
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' .
    DIRECTORY_SEPARATOR . 'autoload.php';

// require phpcs
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' .
    DIRECTORY_SEPARATOR . 'squizlabs' . DIRECTORY_SEPARATOR . 'php_codesniffer' .
    DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR . 'bootstrap.php';
