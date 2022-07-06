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
        die("ok");
        

        echo $this->_template_f;
        
        die;


    }
    
}
