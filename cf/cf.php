<?php
if (!defined('CUSTOM_CHECK_GLB')) {
        header("Location: upgrade");
        die();
}
// define common config
DEFINE('DOMAIN_NAME', $_SERVER['SERVER_NAME']); // define domain name

// config websocket service domain
define('SERVICES_SOCKET_URL', 'https://:8443');

// define chat plugin
define('CHAT_PLUGIN_CODE',"");