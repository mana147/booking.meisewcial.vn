<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landing extends MY_Controller {	
	
	function __construct()
	{
		$this->_module = trim(strtolower(__CLASS__));
		parent::__construct();
	}

    function index()
    {

		$data_view = [];

		
		$data_view['islogin'] = false;
		
		if ($this->_isLogin()) {

			$data_view['info_user_email'] = $_SESSION['user_email'];
			$data_view['info_user_nicename'] = $_SESSION['user_nicename'];

			$data_view['islogin'] = true;
        }

        $this->load->view($this->_template_f . 'landing/landing_view.php', $data_view);
    }
}