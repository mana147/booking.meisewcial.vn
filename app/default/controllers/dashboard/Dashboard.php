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

        if (!$this->_isLogin())
        {
            redirect('/login', 'refresh');
            die();
        }

    }

    function index()
    {
        $data = [];
        echo " Dashboard > ";

        showLOG($_SESSION);

        die;


        $this->_loadHeader();
        $this->load->view($this->_template_f . 'dashboard/dashboard_view');
        $this->_loadFooter();
    }
}
