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

        $data = [];
        $this->_loadHeader();
        $this->load->view($this->_template_f.'login/login_view');
        $this->_loadFooter();
    }    
}
