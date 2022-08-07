<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

    function __construct()
    {
        $this->_module = trim(strtolower(__class__));
        parent::__construct();

        $this->load->model('user/User_models');
    }

    function index()
    {
        $data = [];

        // $this->User_models->get_info_user();
        
        // die;

        echo " Dashboard > " ;

        var_dump($_SESSION);die;


        $this->_loadHeader();
        $this->load->view($this->_template_f . 'dashboard/dashboard_view');
        $this->_loadFooter();
    }
}
