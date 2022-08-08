<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller
{

    function __construct()
    {
        $this->_module = trim(strtolower(__class__));
        parent::__construct();

        $this->load->model('user/User_models');
    }

    // ----------------------------------------------------------------


    function login_user()
    {
        $this->_function = trim(strtolower(__FUNCTION__));

        // get post ;
        $user_email = trim(removeAllTags($this->input->post('user_email')));
        $user_password = trim(removeAllTags($this->input->post('user_password')));
        $user_password = md5($user_password);

        // check in database
        $user_info = $this->User_models->get_info_user($user_email, $user_password);

        if ($user_info) {

            // unset all session before init
            session_unset();
            session_regenerate_id(true);
            // add info to session

            $this->session->set_userdata('user_id', $user_info['ID']);
            $this->session->set_userdata('user_email', $user_info['user_email']);
            $this->session->set_userdata('user_nicename', $user_info['user_nicename']);

            // redirect to dashboard
            redirect('/', 'refresh');

        } else {
            redirect('/login', 'refresh');
            die();
        }

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


        $full_name = trim(removeAllTags($this->input->post('full_name')));
        $phone = trim(removeAllTags($this->input->post('phone')));

        $user_email = trim(removeAllTags($this->input->post('email')));
        $user_password = trim(removeAllTags($this->input->post('password')));
        $user_password = md5($user_password);

        showLOG($_POST);


        // $user_info = $this->User_models->set_info_user($user_email, $user_password);




        die;

    }

    function register_view()
    {
        $this->_function = trim(strtolower(__FUNCTION__));

        $this->load->view($this->_template_f . 'register/register_view');
    }

    // ----------------------------------------------------------------


    function logout()
    {
        $this->_function = trim(strtolower(__FUNCTION__));
        $this->session->sess_destroy();
        redirect('/');
    }
    
}
