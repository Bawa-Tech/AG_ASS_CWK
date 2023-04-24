<?php

class SmeModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    // Add your model methods here
    public function authenticate_login($company_name, $password)
    {
        // Query the database for the sme with the specified username and password
        $query = $this->db->get_where('smes', array(
            'company_name' => $company_name,
            'hashed_password' => hash("sha256", $password)
        ));

        // If a row is returned, the username and password are valid
        $valid = $query->num_rows() === 1;

        if ($valid) {
            $this->session->set_userdata(array(
                "company_name" => $company_name,
                "role" => "sme"
            ));

            return true;
        }
    }

    public function register($company_name, $contact, $password)
    {
        // check if sme already exists
        $query = $this->db->get_where('smes', array(
            'company_name' => $company_name,
        ));

        $unique = $query->num_rows() === 0;

        if (!$unique) {
            return "SME Company name already exists, try logging in !!";
        }

        $hashed_passowrd = hash('sha256', $password);

        $inserted = $this->db->insert('smes', [
            'company_name' => $company_name,
            'contact' => $contact,
            'hashed_password' => $hashed_passowrd,

        ]);

        if (!$inserted) {
            return "Problem occured with registering";
        }

        $this->session->set_userdata(array(
            "company_name" => $company_name,
            "role" => "sme"
        ));

        return true;
    }

    public function add_product($product_name, $product_description, $size, $type, $price_band, $price)
    {
        $sme_name = $this->session->userdata("company_name");
        // check if product name is unique, because the requirement says
        // "The client has confirmed that at present each product can be registered only once, with one SME."
        $query = $this->db->get_where('products', array(
            'product_name' => $product_name,
            'sme_name' => $sme_name
        ));

        $unique = $query->num_rows() === 0;

        if (!$unique) {
            return "This product name is already registered with this company !";
        }

        $inserted = $this->db->insert('products', [
            "product_name" => $product_name,
            "product_description" => $product_description,
            "size" => $size,
            "type" => $type,
            "price_band" => $price_band,
            "sme_name" => $sme_name,
            "price" => $price
        ]);

        if (!$inserted) {
            return "Problem occured with inserting data";
        }
        return true;
    }

    public function all_products_for_this_sme()
    {
        $sme_name = $this->session->userdata("company_name");

        $query = $this->db->get_where('products', array(
            'sme_name' => $sme_name
        ));

        return $query;
    }

    public function filtered_products($type, $price_less_then)
    {
        $filter = array();
        $sme_name = $this->session->userdata("company_name");
        $this->db->where('sme_name', $sme_name);
        if ($type != "") {
            $this->db->where('type', $type);
        }

        if ($price_less_then != "") {
            $this->db->where('price <', $price_less_then);
        }

        $query = $this->db->get('products');

        return $query;
    }
}
