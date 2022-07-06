<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    function __construct() {
        $this->_module = trim(strtolower(__class__));
        parent::__construct();
    }

    function index() {
        $data = [];

        var_dump($this->_template_f);die;
        
        $this->_loadHeader();
        $this->load->view($this->_template_f . 'index/', $data);
        $this->_loadFooter();
    }
    
}
