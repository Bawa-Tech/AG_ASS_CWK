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

        if ($valid) {
            $this->session->set_userdata(array(
                "name" => $name,
                "role" => "resident",
                "resident_id" => $query->result_array()[0]['id']
            ));

            return true;
        }
    }
    public function signup($name, $password, $area, $age_bracket)
    {
        $hashed_password = hash("sha256", $password);
        $insert_data = [
            "name" => $name,
            "hashed_password" => $hashed_password,
            "area" => $area,
            "age_bracket" => $age_bracket,
        ];
        if (!$this->db->insert('residents', $insert_data)) {
            return false; // Insert failed, return false
        }
        return true; // Insert successful
    }



    public function get_all_products()
    {
        $query = $this->db->get('products');
        if ($query->num_rows() > 0) {
            return $query->result_array();
            $this->session->set_flashdata('error', 'products found!!!');
        } else {
            $this->session->set_flashdata('error', 'products nnfound!!!');
            return array();
        }
    }

    public function vote($product_id)
    {
        $resident_id = $this->session->userdata("resident_id");

        $query = $this->db->get_where('votes', array(
            'resident_id' => $resident_id,
            'product_id' => $product_id
        ));

        $unique = $query->num_rows() === 0;

        if (!$unique) {
            return "Already voted !! !!";
        }

        $inserted = $this->db->insert('votes', [
            'resident_id' => $resident_id,
            'product_id' => $product_id
        ]);

        if (!$inserted) {
            return "Problem occured with voting";
        }

        return true;
    }
}
