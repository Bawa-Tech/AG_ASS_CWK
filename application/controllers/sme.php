<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sme extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->library('table');
		$this->load->library('session');
		$this->load->model('SmeModel');
		$this->load->helper("auth_helper");
		$this->load->library('table');
	}

	public function index()
	{
		$header_data = array(
			"title" => "SME Login",
			"previous_page_title" => "register",
			"previous_page_link" => base_url("index.php/sme/register")
		);

		$this->load->view('header', $header_data);
		$this->load->view('sme_login');
		$this->load->view('footer');
	}

	public function login()
	{
		$this->index();
	}

	public function register()
	{
		$header_data = array(
			"title" => "SME Register",
			"previous_page_title" => "Login",
			"previous_page_link" => base_url("index.php/sme/login")
		);

		$this->load->view('header', $header_data);
		$this->load->view('sme_register');
		$this->load->view('footer');
	}

	public function dashboard()
	{
		$this->check_if_is_allowed();

		$header_data = array(
			"title" => "SME Dashboard"
		);

		$this->load->view('header', $header_data);
		$this->load->view('sme_dashboard');
		$this->load->view('footer');
	}

	public function add_product()
	{
		$header_data = array(
			"title" => "SME Add Product",
			"previous_page_title" => "Dashboard",
			"previous_page_link" => base_url("index.php/sme/dashboard")
		);

		$this->load->view('header', $header_data);
		$this->load->view('sme_add_product');
		$this->load->view('footer');
	}

	public function products()
	{


		if ($this->input->server('REQUEST_METHOD') == "POST") {
			$type = $this->input->post("type");
			$price_less_then = $this->input->post("price_less_then");

			if (!$type == "" || !$price_less_then == "") {
				$products = $this->SmeModel->filtered_products($type, $price_less_then);
			} else {
				$products = $this->SmeModel->all_products_for_this_sme();
			}
		} else {

			$products = $this->SmeModel->all_products_for_this_sme();
		}

		$header_data = array(
			"title" => "SME Products",
			"previous_page_title" => "Dashboard",
			"previous_page_link" => base_url("index.php/sme/dashboard")
		);

		$this->load->view('header', $header_data);
		$this->load->view('sme_products', array("products" => $products));
		$this->load->view('footer');
	}

	public function products_gcrud()
	{
		$header_data = array(
			"title" => "SME Products",
			"previous_page_title" => "Dashboard",
			"previous_page_link" => base_url("index.php/sme/dashboard")
		);

		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');

		$crud->set_table('products');
		$crud->set_subject('Product');
		$output = $crud->render();
		// var_dump($output);
		$this->load->view('header', $header_data);
		$this->load->view('sme_products', $output);
		$this->load->view('footer');
	}

	///////////////////////////////////////////////////////////////////////
	// Methods for handling form submissions
	///////////////////////////////////////////////////////////////////////

	public function handle_login()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		// echo $username . " - " . $password;

		if (!$this->SmeModel->authenticate_login($username, $password)) {
			$this->session->set_flashdata('error', 'Invalid Credentials !!!');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			redirect(base_url("index.php/sme/dashboard"));
		}
	}

	public function handle_register()
	{
		$company_name = $this->input->post("company_name");
		$contact = $this->input->post("contact");
		$password = $this->input->post("password");


		$response = $this->SmeModel->register($company_name, $contact, $password);
		if (gettype($response) == "string") {
			$this->session->set_flashdata('error', $response);
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			// redirect to products page
			redirect(base_url("index.php/sme/dashboard"));
		}
	}

	public function handle_add_product()
	{
		$product_name = $this->input->post("product_name");
		$product_description = $this->input->post("product_description");
		$size = $this->input->post("size");
		$type = $this->input->post("type");
		$price_band = $this->input->post("price_band");
		$price = $this->input->post("price");

		$response = $this->SmeModel->add_product($product_name, $product_description, $size, $type, $price_band, $price);
		if (gettype($response) == "string") {
			$this->session->set_flashdata('error', $response);
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			// redirect to products page
			redirect(base_url("index.php/sme/products"));
		}
	}

	///////////////////////////////////////////////////////////////////////
	// Private helper methods
	///////////////////////////////////////////////////////////////////////


	/**
	 * this private method is meant to be used inside of this
	 * controller only. It validates the user's role via AuthHelper
	 * if not valid, then this method redirects to login page for sme.
	 */
	private function check_if_is_allowed()
	{
		$current_role = $this->session->userdata("role");

		if (AuthHelper::is_allowed($current_role, "sme")) {
			return true;
		} else {
			redirect(base_url("index.php/sme/login"));
		}
	}
}
