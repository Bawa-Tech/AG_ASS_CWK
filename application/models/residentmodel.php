<?php

class ResidentModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    // Add your model methods here
    public function authenticate_login($name, $password)
    {
        // Query the database for the resident with the specified username and password
        $query = $this->db->get_where('residents', array(
            'name' => $name,
            'hashed_password' => hash("sha256", $password)
        ));

        // If a row is returned, the username and password are valid
        $valid = $query->num_rows() === 1;
        
        if ( $valid ) {
            $this->session->set_userdata(array(
                "name" => $name,
                "role" => "resident"
            ));

            return true;
        }
    }


}
