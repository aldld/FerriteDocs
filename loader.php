<?php

/**
 * FerriteDocs main loader. All requests are routed through
 * this file and controllers are loaded based on the request.
 */

// Load the main configuration file
require_once __DIR__ . DIRECTORY_SEPARATOR . 'config.php';

use ferrite\database\Database;

$db = Database::getInstance();
