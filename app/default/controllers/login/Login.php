<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller{

    function __construct()
    {
        $this->_module = trim(strtolower(__CLASS__));
        parent::__construct();

        // model
        $this->load->model('login/Login_model');
        $this->load->model('account/Account_model');
    }
    
    function index()
    {
        echo "Login";
        
        $this->_loadHeader();
        $this->_loadFooter();   
    }
}

// von => adn_von
// vonuname => adn_vonuname
// role => and_role
// isp => adn_isp
// vas => adn_vas
// buname => adn_buname