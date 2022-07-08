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
        $this->load->view($this->_template_f . 'landing/landing_view.php', $data);
    }
}