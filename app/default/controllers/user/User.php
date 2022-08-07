<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller
{

    function __construct()
    {
        $this->_module = trim(strtolower(__class__));
        parent::__construct();
    }

    // ----------------------------------------------------------------


    function login_user()
    {
        $this->_function = trim(strtolower(__FUNCTION__));


        $user_email = trim(removeAllTags($this->input->post('user_email')));
        $user_password = trim(removeAllTags($this->input->post('user_password')));
        
        $user_password = md5($user_password);
        
        // unset all session before init
        session_unset();
        session_regenerate_id(true);

        $this->session->set_userdata('user_email', $user_email);
        $this->session->set_userdata('user_password', $user_password);


        redirect('/dashboard', 'refresh');
    }


    function login_view()
    {
        $this->_function = trim(strtolower(__FUNCTION__));

        $data = [];
        $this->_loadHeader();
        $this->load->view($this->_template_f . 'login/login_view');
        $this->_loadFooter();
    }


    // ----------------------------------------------------------------
    function register_user()
    {
        $this->_function = trim(strtolower(__FUNCTION__));

        echo "login_user";
    }

    function register_view()
    {
        $this->_function = trim(strtolower(__FUNCTION__));

        $this->load->view($this->_template_f . 'register/register_view');
    }

    // ----------------------------------------------------------------
}
