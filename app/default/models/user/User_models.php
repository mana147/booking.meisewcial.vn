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



        $query = $this->db->get('booking_users');  // Produces: SELECT

        foreach ($query->result() as $row) {

            // echo $row['user_pass'];
            showLOG($row);
        }

        echo 'Total Results: ' . $query->num_rows();


        die;

        // $servername = "localhost";
        // $username = "nugfhltmhosting_meisewcial";
        // $password = "B?37XHO-_9]^";
        // $dbname = "nugfhltmhosting_meisewcial";

        // // Create connection
        // $conn = new mysqli($servername, $username, $password, $dbname);
        // // Check connection
        // if ($conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error);
        // }

        // $sql = "SELECT * FROM `wp_users`";

        // $result = $conn->query($sql);

        // if ($result->num_rows > 0) {
        //     // output data of each row
        //     while ($row = $result->fetch_assoc()) {
        //         // echo "row: " . $row;

        //         var_dump( $row);

        //     }

        // } else {
        //     echo "0 results";
        // }

        // $conn->close();
    }
}
