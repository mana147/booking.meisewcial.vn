<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_models extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_info_user()
    {

        echo "get info user";

        // $db = $this->load->database();

        // if ($db) {
        //     echo " ok";
        // } else {
        //     echo "fail";
        // }

    }
}
