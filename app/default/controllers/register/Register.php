<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends MY_Controller
{

    function __construct()
    {
        $this->_module = trim(strtolower(__class__));
        parent::__construct();
    }

    function index()
    {
        $this->_function = trim(strtolower(__FUNCTION__));

        $this->load->view($this->_template_f.'register/register_view');
    }    
}
