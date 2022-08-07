<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_models extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_info_user($user_email, $user_password)
    {
        showLOG([$user_email, $user_password]);

        // $query = $this->db->get('booking_users');  // Produces: SELECT

        $this->db->select('*');
        $this->db->from('booking_users');
        $this->db->where('user_email', $user_email);

        $query = $this->db->get();

        if ($query) {

            $info =  $query->result_array();

            if ($info) {

                echo 'has user';
                showLOG($info);

            } else {
                echo 'nots user';
            }


        } else {
            echo 'nots user';
        }

        die;
    }
}
