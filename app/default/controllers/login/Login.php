<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MY_Controller
{

    function __construct()
    {
        $this->_module = trim(strtolower(__class__));
        parent::__construct();
    }

    function index()
    {
        $this->_function = trim(strtolower(__FUNCTION__));
        echo "login";
    }

    function test()
    {
        $this->_function = trim(strtolower(__FUNCTION__));
        echo "test";
    }


    
}
