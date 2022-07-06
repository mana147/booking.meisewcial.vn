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

    define('DB_MASTER_HOST', '192.168.6.7');
	define('DB_MASTER_USER', 'hoangnd');
	define('DB_MASTER_PASS', 'WK5rnkyFaCNCBH8ijTaT');
	define('DB_MASTER_DBNAME', 'adn');
    
}
?>