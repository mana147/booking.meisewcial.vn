<?php if (!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

function showLOG($var = "ok")
{
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}