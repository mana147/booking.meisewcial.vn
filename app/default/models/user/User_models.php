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

    function check_user_email($user_email)
    {
        $this->db->select('*');
        $this->db->from('booking_users');
        $this->db->where('user_email', $user_email);
        $query = $this->db->get();
        if ($query) {
            $info = $query->result_array();
            if ($info) {
                return true;
            } else {
                return false;
            }
        }
    }

    function set_info_to_database($full_name, $phone, $user_email, $user_password)
    {

        $data = array(
            'firstName' => '',
            'middleName' => '',
            'lastName' => '',
            'username' => $full_name,
            'mobile' => $phone,
            'email' => $user_email,
            'passwordHash' => $user_password,
            'registeredAt' => '',
            'lastLogin' => time(),
            'intro' => 'intro',
            'profile' => 'profile'
        );

        $query = $this->db->insert('user', $data);

        //  $user_email
        // $id_calendar = time() . mt_rand();

        // $data = array(
        //     'user_nicename' => $full_name,
        //     'user_phone' => $phone,
        //     'user_login' => $user_email,
        //     'user_email' => $user_email,
        //     'user_pass' => $user_password,
        //     'id_calendar' => $id_calendar
        // );

        // $query = $this->db->insert('booking_users', $data);

        if ($query) {
            return true;
        }
    }
}
