<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    var $_template_f = '';
    var $_langcode = '';
    var $_langcodeid = '';
    var $_module = '';
    var $_function = '';
    var $_product_name = '';
    var $_numShowItem = 30;

    public function __construct()
    {
        parent::__construct();
        $this->_langcode = get_langcode();
        $this->_langcodeid = get_langcode_id($this->_langcode);

        $this->_template_f = $this->config->item('template_f');
        $this->load->language('common', $this->_langcode);


        // init and assign common value to view: language, common lang
        $preHeader = array();
        $preHeader['product_name'] = $this->_product_name;
        $preHeader['common_lang'] = $this->lang->line('common');
        $preHeader['langcode'] = $this->_langcode;
        $preHeader['langcodeid'] = $this->_langcodeid;
        $preHeader['template_f'] = $this->_template_f;
        $preHeader['fullname'] = '';
        $preHeader['userid'] = '';
        $preHeader['role'] = '';
        $preHeader['langcode_url'] = '';
        $preHeader['isLogin'] = false;
        $preHeader['module_name'] = $this->_module;

        // set lang code for multi language url
        $arrLang = $this->config->item('lang_uri_abbr');
        $langcodeUrl = '';

        $preHeader['langcode_url'] = $langcodeUrl;

        if ($this->_isLogin()) {
            $preHeader['userid'] = $this->_session_uid();
            $preHeader['role'] = $this->_session_role();
            $preHeader['isLogin'] = true;
        }

        // assign all common param to view
        $this->load->view($this->_template_f . 'preheader_view', $preHeader);
    }

    protected function _loadHeader($data = null, $isLoadHeader = true)
    {
        $header = array();

        // load header
        $this->load->view($this->_template_f . 'header_view', $header);
    }

    protected function _loadFooter()
    {
        $this->load->view($this->_template_f . 'footer_view');
    }

    protected function _session_uid()
    {
        $user_id = trim($this->session->userdata('user_id'));
        $user_id = isIdNumber($user_id) ? $user_id : 0;
        return $user_id;
    }

    protected function _session_user_email()
    {
        $user_email = trim($this->session->userdata('user_email'));
        return $user_email;
    }


    protected function _session_role()
    {
        $role = trim($this->session->userdata('role'));
        $role = $role >= -1 && $role <= 10 && is_numeric($role) ? $role : 3;
        return $role;
    }

    protected function _session_fullname()
    {
        $uname = $this->session->userdata('lastname') . ' ' . $this->session->userdata('firstname');
        return $uname;
    }

    protected function _isLogin()
    {
        $user_email = $this->_session_user_email();
        $user_id = $this->_session_uid();
        
        // $firstname = $this->_session_fullname();

        return ($user_id > 0 && $user_email != '') ? true : false;
    }

    protected function _isPost()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            return true;
        }
        return false;
    }
}
