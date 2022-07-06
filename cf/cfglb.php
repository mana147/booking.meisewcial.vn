<?php
if (!defined('CUSTOM_CHECK_GLB'))
{
    header("Location: upgrade");
    die();
}
else
{
	// define http protocol
	define('HTTP_PROTOCOL', 'http');

    define('DB_MASTER_HOST', 'localhost');
	define('DB_MASTER_USER', 'nugfhltmhosting_booking');
	define('DB_MASTER_PASS', 'Hieu761321');
	define('DB_MASTER_DBNAME', 'nugfhltmhosting_booking');
}
?>