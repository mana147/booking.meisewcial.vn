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

        if (!$this->_isLogin()) {
            redirect('/login', 'refresh');
            die();
        }
    }

    function index()
    {
        $data_view = [];

        $data_view['info_user_email'] = $_SESSION['user_email'];
        $data_view['info_user_nicename'] = $_SESSION['user_nicename'];

        $this->_loadHeader();
        $this->load->view($this->_template_f . 'dashboard/dashboard_view' , $data_view);
        $this->_loadFooter();
    }
}
