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
        // $this->_loadHeader();
        // $this->load->view($this->_template_f . 'dashboard/dashboard_view', $data);
        $this->_loadFooter();

    }
    
}
