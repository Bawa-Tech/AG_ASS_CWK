<?php

class CouncilModel extends CI_Model
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
        $query = $this->db->get_where('councils', array(
            'name' => $name,
            'hashed_password' => hash("sha256", $password)
        ));

        // If a row is returned, the username and password are valid
        $valid = $query->num_rows() === 1;
        
        if ( $valid ) {
            $this->session->set_userdata(array(
                "name" => $name,
                "role" => "council"
            ));

            return true;
        }
    }
    public function signup($name, $password, $area){
        $hashed_password = hash("sha256", $password);
        $insert_data = [
            "name" => $name,
            "hashed_password" => $hashed_password,
            "area" => $area,
        ];
        $query = $this->db->get_where('councils', array(
            'name' => $name,
        ));
    
        $unique = $query->num_rows() === 0;
    
        if ( ! $unique ) {
            return false;
        }
        if (!$this->db->insert('councils', $insert_data)) {
            return false; // Insert failed, return false
        }
        return true; // Insert successful
    }
    
    

    
    public function get_all_products() {
        $query = $this->db->get('products');
        if ($query->num_rows() > 0) {
            return $query->result_array();
            $this->session->set_flashdata('error', 'products found!!!');
        } else {
            $this->session->set_flashdata('error', 'products nnfound!!!');
            return array();
        }
    }
    

    public function getAllAreas() {
        $this->db->select('area');
        $query = $this->db->get('councils');
        return $query->result_array();
    }
    
    
    
    
    
    

}
