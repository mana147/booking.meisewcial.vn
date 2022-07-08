<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landing extends MY_Controller {	
	
	function __construct()
	{
		$this->_module = trim(strtolower(__CLASS__));
		parent::__construct();
	}

    function index()
    {
		$data = [];

		echo "Landing";

        // $this->_loadHeader();
        // $this->load->view($this->_template_f . 'dashboard/dashboard_view', $data);
        // $this->_loadFooter();
    }
}