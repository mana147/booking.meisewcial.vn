<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_models extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_info_user()
    {

        $servername = "localhost";
        $username = "nugfhltmhosting_meisewcial";
        $password = "B?37XHO-_9]^";

        // Create connection
        $conn = new mysqli($servername, $username, $password);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
    }
}
