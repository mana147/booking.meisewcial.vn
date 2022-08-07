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
        $this->db->select('*');
        $this->db->from('booking_users');
        $this->db->where('user_email', $user_email);

        $query = $this->db->get();

        if ($query) {

            $info = $query->result_array();

            if ($info) {

                if ($user_password ==  $info[0]['user_pass']) {

                    return $info[0];

                } else {
                    return false;
                    // echo 'error password';
                }

            } else {
                return false;
                // echo 'error user';
            }
        }
    }
}
